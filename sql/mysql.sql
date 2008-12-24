#
# Table structure for wiwimod 0.7
#

CREATE TABLE wiwimod (
  id int(10) NOT NULL auto_increment,
  keyword varchar(255) NOT NULL default '',
  title varchar(255) NOT NULL default '',
  body text NOT NULL,
  lastmodified datetime NOT NULL default '0000-00-00 00:00:00',
  u_id int(10) NOT NULL default '0',
  visible int(3) default '0',
  contextBlock varchar(255) default '',
  parent varchar(255) default '',
  pageid int(10) default '0',
  prid integer default '0',
  PRIMARY KEY (id)
) TYPE=MyISAM;

CREATE TABLE wiwimod_profiles (
   prid integer not null auto_increment,
   prname varchar(20) not null default '',
   commentslevel integer default 0,
   historylevel integer default 1,
   PRIMARY KEY (prid) 
) TYPE=MyISAM;

CREATE TABLE wiwimod_prof_groups (
   prid integer,
   gid integer,
   priv smallint
)  TYPE=MyISAM;
