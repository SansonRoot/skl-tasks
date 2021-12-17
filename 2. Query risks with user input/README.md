## Risks associated with queries
User input can contain texts, malicious data format, unrecognized data type
Hence this can pose the following risks when executing queries from user input

1. A user can have access to the entire database through injection from executing a user input with database injection
2. The entire database and/or tables can be compromised and from a query executed with user input containing deletion injection
3. User input may contain duplicate records, which reduces the data integrity
4. User input may contain invalidated data, like invalid emails, unusually long texts, invalid dates, phone numbers and so on

### Some Controls to counteract risks with user input
1. Sanitize user input to encode wild cards and special characters to prevent database injection
2. Define unique keys to some of the columns in the database to prevent data duplication
3. Implement input validation of user input before passing it through to the models for query execution
