## a. How to transfer data to mysql
### How I did it 
1. Install `mysql server` and ensure it is running correctly
2. Create a new database and give it a name, `jobcluster`
3. Write php script to read `.xls` files and extract the data from the excel file
4. Write a php script to perform a transactional/batch write of the data into the database
5. Implement idempotency to cater for failed transactions whilst maintaining data integrity with multiple upload attempts of the same file
6. Image to the import records is included in this directory (`1b. query for job access.png`)

## b. SQL Query
> Database : jobcluster
>
> Table : hits

```
SELECT 
    distinct(h.job_title), 
    count(h.job_id) no_of_hits, 
    min(h.date_time) first_access,
    max(h.date_time) last_access
FROM jobcluster.hits h
GROUP BY h.job_title;
```

## c. Normalize the database
1. This will involve the use of an additional table
2. Store the job names and ids to the hits table
3. Create a second table with foreign key reference to the hits table
4. Store the job accesses in the new table with foreign key reference to the job_ids in the jobs table

## c. SQL Query With Normalized data
> Database : jobcluster
>
> Table 1 : hits
>
> Table 2 : job_accesses
>

```
WITH reports AS (
SELECT 
    j.job_id,
    count(j.id) no_of_hits, 
    min(j.date_time) first_access,
    min(j.date_time) last_access
FROM jobcluster.job_accesses j
GROUP BY j.id
)
SELECT 
    h.job_title, 
    r.no_of_hits,
    r.first_access,
    r.last_access
FROM jobcluster.hits h 
LEFT JOIN reports r
ON h.id = r.job_id
```

## How to run this app on your own
1. Make sure you have mysql installed and  is running on your environment
2. Create a new database for the application
3. Update the connection configuration in the $config array in the HitModel.php file
4. Execute the import file by executing `php HitsImport.php` 
5. All Done, you can execute the import as many times as you wish, no duplicate data will get imported



