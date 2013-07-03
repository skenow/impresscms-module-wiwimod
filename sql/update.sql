
DELETE %%wiki_profiles, %%wiki_prof_groups FROM %%wiki_profiles, %%wiki_prof_groups WHERE %%wiki_profiles.prid = %%wiki_prof_groups.prid AND %%wiki_profiles.prname IN ('Open content', 'Public content', 'Private content');

INSERT INTO %%wiki_profiles ( prname, commentslevel ) VALUES ( 'Open content' , 1 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID() , 3, 1 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 1 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 1 );

INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 3, 2 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 2 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 2 );

INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 3, 3 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 3 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 3 );

INSERT INTO %%wiki_profiles ( prname, commentslevel ) VALUES ( 'Public content' , 1 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 3, 1 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 1 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 1 );

INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 2 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 2 );

INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 3 );

INSERT INTO %%wiki_profiles ( prname, commentslevel ) VALUES ( 'Private content' , 1 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 1 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 1 );

INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 2 );
INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 2 );

INSERT INTO %%wiki_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 3 );
