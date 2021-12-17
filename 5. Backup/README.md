## Backup bash script

This is a bash script and will backup the two stated directories to the backups folder

To set this as a recurring automated task, 
we will create a cronjob and bind the script and time of execution flags to it
We will set our cron job to be executed every day at 1:15 am

1. Install cron `sudo apt install cron`
2. Add cron job `crontab -e`
3. Append the routing flags `15 01 * * * /path/to/backup-script`
4. Voala !! we are through.