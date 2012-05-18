#!/bin/bash

### config
backup_root="/var/www/nas/backup/htdocs";
app="mj";
year=`date +%Y`;
month=`date +%m`;
day=`date +%d`;
backup_dir=`date +%s`;

### create backup directory
if [[ ! -e ${backup_root}/backup ]]; then
	mkdir ${backup_root}/backup;
fi
if [[ ! -e ${backup_root}/backup/${app} ]]; then
	mkdir ${backup_root}/backup/${app};
fi
if [[ ! -e ${backup_root}/backup/${app}/${year} ]]; then
	mkdir ${backup_root}/backup/${app}/${year};
fi
if [[ ! -e ${backup_root}/backup/${app}/${year}/${month} ]]; then
	mkdir ${backup_root}/backup/${app}/${year}/${month};
fi
if [[ ! -e ${backup_root}/backup/${app}/${year}/${month}/${day} ]]; then
	mkdir ${backup_root}/backup/${app}/${year}/${month}/${day};
fi
if [[ ! -e ${backup_root}/backup/${app}/${year}/${month}/${day}/${backup_dir} ]]; then
	mkdir ${backup_root}/backup/${app}/${year}/${month}/${day}/${backup_dir};
fi

### copy files
if [[ -e ${backup_root}/backup/${app}/${year}/${month}/${day}/${backup_dir} ]]; then
	cp -Rf index.php images js ${backup_root}/backup/${app}/${year}/${month}/${day}/${backup_dir}/;
fi
