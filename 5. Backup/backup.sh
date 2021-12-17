#!/usr/bin/env bash

CDATE=`date +"%Y-%m-%d"`

#create directory to hold backup
mkdir /mnt/backuptest/backup_${CDATE}

#move contents of dirs to the backup
mv /var/www/bewerber /var/www/test /mnt/backuptest/backup_${CDATE}

#create a zip file of the directory
tar -zcf /mnt/backuptest/backup_${CDATE}.tar.bz2 /mnt/backuptest/backup_${CDATE}

#delet the folder, only retain the archive
rm -rf /mnt/backuptest/backup_${CDATE}

#obtain the file count in the backup dir
FILECOUNT=`ls /mnt/backuptest | wc -l`

#check if file count is more than 5, delete the oldest
if [ ${FILECOUNT} -gt 5 ]; then
    OLDEST=`find /mnt/backuptest -maxdepth 1 -type d -printf '%T@ %p\n' | sort | head -n 1`

   rm -rf $OLDEST
fi