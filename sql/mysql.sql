CREATE TABLE wiki_pages (
  `pageid` int unsigned NOT NULL auto_increment COMMENT 'Unique integer ID for the page',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT 'Keyword/page name',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title of the page',
  `creator` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Userid for the user that created the page, from users.uid',
  `createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Datetime the page was created',
  `prid` int NOT NULL DEFAULT 0 COMMENT 'Profile id to control page access, defined in wiki_profiles.prid',
  `parent` varchar(255) DEFAULT '' COMMENT 'Keyword/page name of the parent page for the page',
  `views` int UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Number of times this page has been viewed',
  `visible` int DEFAULT 0 COMMENT 'Determines if the page is visible in the index and its sort order (weight)',
  `revisions` int DEFAULT 0 COMMENT 'The number of times the page has been revised',
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Last time this page was revised',
  `lastviewed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Last time this page was viewed by someone other than the last author',
  `allowComments` ENUM('0','1') DEFAULT '1' COMMENT 'Allow or restrict (additional) comments for the page',
  `contextBlock` varchar(255) DEFAULT '' COMMENT 'Keyword/page name for the related content block',
  PRIMARY KEY (`pageid`),
  UNIQUE KEY (`keyword`)
) COMMENT 'Holds the list of pages and their properties';

CREATE TABLE wiki_revisions (
  `revid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `pageid` int UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Link to wiki_pages.pageid',
  `body` mediumtext NOT NULL COMMENT 'Text for this revision',
  `summary` tinytext COMMENT 'Summary of the revision by the author',
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp for the revision',
  `userid` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Userid for the user that modified the page, from users.uid',
  PRIMARY KEY page (`revid`)
) COMMENT 'Holds details of the individual revisions to each page';

CREATE TABLE wiki_profiles (
  `prid` integer not null auto_increment,
  `prname` varchar(20) not null default '',
  `commentslevel` integer default 0,
  `historylevel` integer default 1,
  PRIMARY KEY (`prid`) 
);

CREATE TABLE wiki_prof_groups (
  `prid` integer,
  `gid` integer,
  `priv` smallint
);
