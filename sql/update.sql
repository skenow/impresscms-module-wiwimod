
DELETE %%wiwimod_profiles, %%wiwimod_prof_groups FROM %%wiwimod_profiles, %%wiwimod_prof_groups WHERE %%wiwimod_profiles.prid = %%wiwimod_prof_groups.prid AND %%wiwimod_profiles.prname IN ('Open content', 'Public content', 'Private content');

INSERT INTO %%wiwimod_profiles ( prname, commentslevel ) VALUES ( 'Open content' , 1 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID() , 3, 1 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 1 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 1 );

INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 3, 2 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 2 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 2 );

INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 3, 3 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 3 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 3 );

INSERT INTO %%wiwimod_profiles ( prname, commentslevel ) VALUES ( 'Public content' , 1 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 3, 1 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 1 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 1 );

INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 2 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 2 );

INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 3 );

INSERT INTO %%wiwimod_profiles ( prname, commentslevel ) VALUES ( 'Private content' , 1 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 1 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 1 );

INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 2, 2 );
INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 2 );

INSERT INTO %%wiwimod_prof_groups ( prid, gid, priv ) VALUES ( LAST_INSERT_ID(), 1, 3 );
