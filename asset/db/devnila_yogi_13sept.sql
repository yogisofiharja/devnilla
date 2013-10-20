ALTER TABLE  `contactus` ADD  `company` VARCHAR( 200 ) NULL AFTER  `name` ,
ADD  `website` VARCHAR( 100 ) NULL AFTER  `company` ;

ALTER TABLE  `contactus` CHANGE  `date_post`  `date_post` TIMESTAMP NOT NULL ;