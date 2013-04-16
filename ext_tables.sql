#
# Table structure for table 'tx_loginprotection_failedlogins'
#
CREATE TABLE tx_loginprotection_failedlogins (
	uid         int(11)                  NOT NULL auto_increment,
	pid         int(11)     DEFAULT '0'  NOT NULL,
	ip          VARCHAR(50) DEFAULT ''   NOT NULL,
	mode        ENUM('FE', 'BE')         NOT NULL,
	tstamp      int(11) unsigned DEFAULT '0' NOT NULL,
	username    VARCHAR(50) DEFAULT ''   NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
);