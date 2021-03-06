-- DDL generated by Postico 1.4.2
-- Not all database features are supported. Do not use for backup.

-- Table Definition ----------------------------------------------

CREATE TABLE advertisement (
    id integer DEFAULT nextval('advertisements_id_seq'::regclass) PRIMARY KEY,
    title character varying(50),
    content character varying(256),
    url character varying(256),
    administrator integer REFERENCES user(id)
);

-- Indices -------------------------------------------------------

CREATE UNIQUE INDEX advertisements_pkey ON advertisement(id int4_ops);

-- DDL generated by Postico 1.4.2
-- Not all database features are supported. Do not use for backup.

-- Table Definition ----------------------------------------------

CREATE TABLE authtoken (
    id SERIAL PRIMARY KEY,
    selector character varying(255) NOT NULL,
    validator character varying(255) NOT NULL,
    expiration timestamp without time zone NOT NULL,
    type integer NOT NULL,
    user_id integer NOT NULL REFERENCES user(id)
);

-- Indices -------------------------------------------------------

CREATE UNIQUE INDEX authtoken_pkey ON authtoken(id int4_ops);

-- DDL generated by Postico 1.4.2
-- Not all database features are supported. Do not use for backup.

-- Table Definition ----------------------------------------------

CREATE TABLE category (
    id SERIAL PRIMARY KEY,
    name character varying(255) NOT NULL
);

-- Indices -------------------------------------------------------

CREATE UNIQUE INDEX category_pkey ON category(id int4_ops);

-- DDL generated by Postico 1.4.2
-- Not all database features are supported. Do not use for backup.

-- Table Definition ----------------------------------------------

CREATE TABLE program (
    id SERIAL PRIMARY KEY,
    name character varying(255) NOT NULL,
    type integer NOT NULL,
    category_id integer NOT NULL REFERENCES category(id),
    distance_learning boolean NOT NULL,
    degree character varying(255) NOT NULL,
    price double precision NOT NULL,
    duration character varying(255) NOT NULL,
    description text NOT NULL,
    requirements text NOT NULL,
    url character varying(255) NOT NULL,
    start_date date NOT NULL,
    provider_id integer NOT NULL REFERENCES provider(id),
    is_billed boolean DEFAULT false
);

-- Indices -------------------------------------------------------

CREATE UNIQUE INDEX program_pkey ON program(id int4_ops);

-- DDL generated by Postico 1.4.2
-- Not all database features are supported. Do not use for backup.

-- Table Definition ----------------------------------------------

CREATE TABLE provider (
    id integer DEFAULT nextval('provider_int_seq'::regclass) PRIMARY KEY,
    name character varying(255) NOT NULL,
    description character varying(1000) NOT NULL,
    plz integer NOT NULL,
    city character varying(255) NOT NULL,
    street character varying(255) NOT NULL,
    billing_email character varying(255) NOT NULL,
    administrator integer NOT NULL REFERENCES user(id)
);

-- Indices -------------------------------------------------------

CREATE UNIQUE INDEX provider_pkey ON provider(id int4_ops);

-- DDL generated by Postico 1.4.2
-- Not all database features are supported. Do not use for backup.

-- Table Definition ----------------------------------------------

CREATE TABLE user (
    id SERIAL PRIMARY KEY,
    lastname character varying(255) NOT NULL,
    firstname character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    admin boolean DEFAULT false,
    provider_admin boolean DEFAULT false,
    ad_admin boolean DEFAULT false
);

-- Indices -------------------------------------------------------

CREATE UNIQUE INDEX user_pkey ON user(id int4_ops);

INSERT INTO "public"."advertisement"("id","title","content","url","administrator")
VALUES
(8,E'Car Tuning',E'More Bang for your Buck!',E'https://www.autoscout24.ch/de/auto-modelle/fiat--multipla',10),
(10,E'Jägermeister',E'The only good bombs are Jägerbombs',E'http://jägermeister.de',1),
(11,E'New Laptops',E'It does the work for you!',E'http://www.apple.ch',1),
(12,E'Online shop for everything',E'alibaba fulfils all you dreams',E'http://www.alibaba.com',1),
(13,E'Mike Tyson - Meet & Great',E'Meet & Great - Punches included',E'https://de.wikipedia.org/wiki/Mike_Tyson',1),
(20,E'Little Treats',E'Keep focused while studying!',E'https://snushof.com/',1),
(21,E'Funny Memes',E'Funny content to watch while studying!',E'http://www.9gag.com',1),
(22,E'Knowledge',E'Provides knowledge directly into your brain!',E'https://de.wikipedia.org/wiki/Wikipedia:Hauptseite',10),
(23,E'Incredible language',E'Make amazing websites!',E'http://www.php.net/',10),
(24,E'Cool Videos',E'Epic video platform to hang out and laugh!',E'https://www.youtube.com/',10),
(25,E'Free TV',E'Don\'t pay and watch for free',E'http://livetv.sx',11),
(26,E'bla',E'bla',E'http://www.apple.ch',1);


INSERT INTO "public"."category"("id","name")
VALUES
(1,E'Economy'),
(2,E'Computer Science'),
(3,E'Legal'),
(4,E'Media'),
(5,E'Marketing'),
(6,E'Social');

INSERT INTO "public"."program"("id","name","type","category_id","distance_learning","degree","price","duration","description","requirements","url","start_date","provider_id","is_billed")
VALUES
(2,E'test 1',1,3,TRUE,E'Bachelor',10.5,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(11,E'Niklaus und die Wundertüte',1,1,TRUE,E'Master',1000,E'5 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-12-10',2,FALSE),
(14,E'test 1',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(15,E'test 1',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(16,E'Niklaus und die Wundertüte',1,1,TRUE,E'Master',1000,E'5 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',2,FALSE),
(17,E'test 1',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(18,E'Test 1',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(19,E'Test 2',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',6,FALSE),
(20,E'Test 3',1,2,TRUE,E'Master',10,E'5 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',2,FALSE),
(21,E'Test 4',1,1,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(22,E'Test 5',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(23,E'Test 6',1,4,TRUE,E'Master',10,E'6 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',2,FALSE),
(24,E'Test 7',1,4,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(25,E'Test 8',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(26,E'Test 9',1,3,TRUE,E'Master',10,E'7 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',2,FALSE),
(27,E'Test 10',1,2,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(28,E'Test 11',1,1,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(29,E'Test 12',1,3,TRUE,E'Master',10,E'8 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',2,FALSE),
(30,E'Test 13',1,4,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(31,E'Test 14',1,4,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(32,E'Test 15',1,3,TRUE,E'Master',10,E'9 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',2,FALSE),
(33,E'Test 16',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(34,E'Test 17',1,2,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(35,E'Test 18',1,1,TRUE,E'Master',10,E'10 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',2,FALSE),
(36,E'Test 19',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(37,E'Test 20',1,4,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(38,E'Test 21',1,4,TRUE,E'Master',10,E'11 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',2,FALSE),
(39,E'Test 22',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(40,E'Test 23',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(41,E'Test 24',1,2,TRUE,E'Master',10,E'12 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',1,FALSE),
(42,E'Test 25',1,1,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',2,FALSE),
(43,E'Test 26',1,3,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',1,FALSE),
(44,E'Test 27',1,4,TRUE,E'Master',10,E'13 Sem.',E'test',E'Test',E'www.fhnw.ch',E'2018-10-12',1,FALSE),
(45,E'Test 28',1,4,TRUE,E'Bachelor',10,E'2 Years',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',E'https://www.youtube.com/watch?v=gy1B3agGNxw',E'2019-01-01',2,FALSE),
(46,E'peter',1,1,TRUE,E'Bachelor',1,E'1',E'1',E'1',E'1',E'2019-01-01',7,FALSE);

INSERT INTO "public"."provider"("id","name","description","plz","city","street","billing_email","administrator")
VALUES
(1,E'FHNW Basel',E'Bachelor of Arts',4000,E'Basel',E'Margaretenstrasse 100',E'roger.kaufmann1@students.fhnw.ch',12),
(2,E'FHNW Olten',E'Bachelor of Science',4135,E'Spreitebach',E'Jabostrasse 1',E'roger.kaufmann1@students.fhnw.ch',9),
(6,E'CaveSchool',E'Learning in the Dark',4002,E'CaveLand',E'Im Loch 2',E't@t.ch',12),
(7,E'peterSchool',E'1',1,E'1',E'1',E'1',15);

INSERT INTO "public"."user"("id","lastname","firstname","email","password","admin","provider_admin","ad_admin")
VALUES
(1,E'Dahut',E'Jaba',E'Jaba.dahut@babo.ch',E'$2y$10$xtNDEPRL27AKMRngeQSa6.bWJk/fsPBpDuTgrJtQS0OVwV/GfN93O',FALSE,TRUE,FALSE),
(2,E'Admin',E'User',E'a.b@c.com',E'$2y$10$LONK4S62yOORCI0Vaq.V/eJ5xS.RsfSjgpEONwMYGUUgpVSqXELBW',TRUE,FALSE,FALSE),
(3,E'Admin',E'Provider1',E'a.p@c.com',E'1',FALSE,TRUE,FALSE),
(9,E'1223',E'2231',E'sdf@f.ch',E'$2y$10$dOtnXy5fNKbjcNJWOqdtdOjEHqMHofehpFvYL6jT07W6R1Zvb7dES',FALSE,FALSE,TRUE),
(10,E'AD1',E'Lord',E'lord.advertisement@test.ch',E'$2y$10$970unl0tu1vCJvlxdm00F.7kmpq/1ln.MFDKogFKLfPs45m.BxJty',FALSE,FALSE,TRUE),
(11,E'TimAdvertiser',E'TimAdvertiser',E'ad@ad.ch',E'$2y$10$TWJjdit2Tp5wyk.EeWe8LuYgzhJzETo5BsSc3//RdLBmnnNS7Z/Hy',FALSE,FALSE,TRUE),
(12,E'TimProvider',E'TimProvider',E'provider@provider.ch',E'$2y$10$iX3qKbI5aIgVRj53OLyJVeLU5LeFZFsWEaUgZK/jFkVx8LZz2PG7m',FALSE,TRUE,FALSE),
(13,E'TimSiteAdmin',E'TimSiteAdmin',E'admin@admin.ch',E'$2y$10$s1Nx3OQ822ETs389veVIP.Bt0pn4204Iq.oe12auYLBWCGfL./TFy',TRUE,FALSE,FALSE),
(15,E'1',E'peter',E'peter@.ch',E'$2y$10$uFlUAaXx8RiP2EB4GBpji.uuGGvgTHUXZlxtocIi16g8znTJGzYbS',FALSE,TRUE,FALSE),
(16,E'1',E'gürkan',E'gürkan@g.ch',E'$2y$10$y.ggiFniYJYu9.8pydkLc..kVrNFDcK698iaENMRVsGzaB2Cpry92',FALSE,TRUE,FALSE),
