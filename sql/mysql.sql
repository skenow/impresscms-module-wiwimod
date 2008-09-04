#
# Table structure for wiwimod 0.7
#

CREATE TABLE wiwimod (
  id int(10) NOT NULL auto_increment,
  keyword varchar(255) NOT NULL default '',
  title varchar(255) NOT NULL default '',
  body text NOT NULL default '',
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

INSERT INTO wiwimod_profiles ( prname, commentslevel ) VALUES ( 'Open content' , 1 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID() , 3, 1 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 1 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 1 );

INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 3, 2 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 2 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 2 );

INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 3, 3 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 3 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 3 );

INSERT INTO wiwimod_profiles ( prname, commentslevel ) VALUES ( 'Public content' , 1 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 3, 1 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 1 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 1 );

INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 2 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 2 );

INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 3 );

INSERT INTO wiwimod_profiles ( prname, commentslevel ) VALUES ( 'Private content' , 1 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 1 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 1 );

INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 2 );
INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 2 );

INSERT INTO wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 3 );

INSERT INTO wiwimod VALUES (
	1,'WiwiHome','Your Wiwi home page',
	'<P>\r\n<TABLE border=0>\r\n<TBODY>\r\n<TR>\r\n<TD>\r\n<P>Welcome ;<BR>This is Wiwi\'s default home page. Feel free to edit and modify it . To create new pages, type in anywhere a page name and surround it with double square brackets ( [[ ). When you save this page, the brackets will be replaced by a link to your new page.</P>\r\n<P>Check <A href=\"manual.html\" target=_blank>the manual</A> for an in depth view of editing features.</P></TD>\r\n<TD><IMG src=\"/modules/wiwimod/images/wiwilogo.gif\"></TD></TR></TBODY></TABLE></P>\r\n<P>\r\n<TABLE style=\"WIDTH: 100%\" cellSpacing=5 cellPadding=5 width=\"100%\" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD bgColor=#e4e4e4>Pages index</TD>\r\n<TD bgColor=#e4e4e4>Recently modified pages</TD></TR>\r\n<TR>\r\n<TD bgColor=#f6f6f6>&lt;[PageIndex]&gt;</TD>\r\n<TD bgColor=#f6f6f6>&lt;[RecentChanges]&gt;</TD></TR></TBODY></TABLE><BR><BR></P>',
	'2005-03-06 00:02:09',1,0,'','',1,1);

