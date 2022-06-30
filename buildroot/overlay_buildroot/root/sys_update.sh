#!/bin/sh

new_version=$(ssh dev@10.30.1.238 "cat buildroot/.sys_version")  
current_version=$(cat /data/.sys_version)                        

if [ $new_version = $current_version ]
then
	echo already up to date!
else
	# if anything mounted on /mnt, to mount /dev/mmcblk0p1
	if mount | grep -qs /mnt
	then
		umount /mnt
	fi
	mount /dev/mmcblk0p1 /mnt


	# check on which partition we boot
	if grep -qs mmcblk0p3 /mnt/cmdline.txt
	then
		old_partition=mmcblk0p3
		new_partition=mmcblk0p2
	else
		old_partition=mmcblk0p2
		new_partition=mmcblk0p3
	fi
	echo $new_partition

	# kill job that updates db if running
	if ps | grep -v "grep" | grep -qs sensors2db
	then
		jobid=$(ps | grep -v "grep" | grep sensors2db | egrep -o "[0-9]{2,4}")
		kill $jobid
	fi


	# copy the new image
	echo "Copying image..."
	scp dev@10.30.1.238:/home/dev/buildroot/buildroot-2022.02.2/output/images/rootfs.ext2 /dev/$new_partition && echo "Copy done"
	

	# replace boot partition in /dev/mmcblk0p1
	sed -i "s/$old_partition/$new_partition/" /mnt/cmdline.txt
	
	echo $new_version > /data/.sys_version

	echo "rebooting..."
	sleep 3
	reboot	
	
fi
