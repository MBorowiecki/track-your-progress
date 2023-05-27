--
-- PostgreSQL database dump
--

-- Dumped from database version 11.19 (Ubuntu 11.19-1.pgdg20.04+1)
-- Dumped by pg_dump version 15.1

-- Started on 2023-05-27 17:04:16 CEST

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 27 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 9 (class 3079 OID 17135)
-- Name: btree_gin; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS btree_gin WITH SCHEMA public;


--
-- TOC entry 4034 (class 0 OID 0)
-- Dependencies: 9
-- Name: EXTENSION btree_gin; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION btree_gin IS 'support for indexing common datatypes in GIN';


--
-- TOC entry 5 (class 3079 OID 17676)
-- Name: btree_gist; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS btree_gist WITH SCHEMA public;


--
-- TOC entry 4035 (class 0 OID 0)
-- Dependencies: 5
-- Name: EXTENSION btree_gist; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION btree_gist IS 'support for indexing common datatypes in GiST';


--
-- TOC entry 16 (class 3079 OID 16661)
-- Name: citext; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS citext WITH SCHEMA public;


--
-- TOC entry 4036 (class 0 OID 0)
-- Dependencies: 16
-- Name: EXTENSION citext; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION citext IS 'data type for case-insensitive character strings';


--
-- TOC entry 7 (class 3079 OID 17573)
-- Name: cube; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS cube WITH SCHEMA public;


--
-- TOC entry 4037 (class 0 OID 0)
-- Dependencies: 7
-- Name: EXTENSION cube; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION cube IS 'data type for multidimensional cubes';


--
-- TOC entry 22 (class 3079 OID 16384)
-- Name: dblink; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS dblink WITH SCHEMA public;


--
-- TOC entry 4038 (class 0 OID 0)
-- Dependencies: 22
-- Name: EXTENSION dblink; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dblink IS 'connect to other PostgreSQL databases from within a database';


--
-- TOC entry 10 (class 3079 OID 17130)
-- Name: dict_int; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS dict_int WITH SCHEMA public;


--
-- TOC entry 4039 (class 0 OID 0)
-- Dependencies: 10
-- Name: EXTENSION dict_int; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dict_int IS 'text search dictionary template for integers';


--
-- TOC entry 4 (class 3079 OID 18299)
-- Name: dict_xsyn; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS dict_xsyn WITH SCHEMA public;


--
-- TOC entry 4040 (class 0 OID 0)
-- Dependencies: 4
-- Name: EXTENSION dict_xsyn; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dict_xsyn IS 'text search dictionary template for extended synonym processing';


--
-- TOC entry 6 (class 3079 OID 17660)
-- Name: earthdistance; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS earthdistance WITH SCHEMA public;


--
-- TOC entry 4041 (class 0 OID 0)
-- Dependencies: 6
-- Name: EXTENSION earthdistance; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION earthdistance IS 'calculate great-circle distances on the surface of the Earth';


--
-- TOC entry 17 (class 3079 OID 16650)
-- Name: fuzzystrmatch; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS fuzzystrmatch WITH SCHEMA public;


--
-- TOC entry 4042 (class 0 OID 0)
-- Dependencies: 17
-- Name: EXTENSION fuzzystrmatch; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION fuzzystrmatch IS 'determine similarities and distance between strings';


--
-- TOC entry 11 (class 3079 OID 17007)
-- Name: hstore; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS hstore WITH SCHEMA public;


--
-- TOC entry 4043 (class 0 OID 0)
-- Dependencies: 11
-- Name: EXTENSION hstore; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION hstore IS 'data type for storing sets of (key, value) pairs';


--
-- TOC entry 12 (class 3079 OID 16889)
-- Name: intarray; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS intarray WITH SCHEMA public;


--
-- TOC entry 4044 (class 0 OID 0)
-- Dependencies: 12
-- Name: EXTENSION intarray; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION intarray IS 'functions, operators, and index support for 1-D arrays of integers';


--
-- TOC entry 20 (class 3079 OID 16444)
-- Name: ltree; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS ltree WITH SCHEMA public;


--
-- TOC entry 4045 (class 0 OID 0)
-- Dependencies: 20
-- Name: EXTENSION ltree; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION ltree IS 'data type for hierarchical tree-like structures';


--
-- TOC entry 2 (class 3079 OID 18311)
-- Name: pg_stat_statements; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pg_stat_statements WITH SCHEMA public;


--
-- TOC entry 4046 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION pg_stat_statements; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pg_stat_statements IS 'track execution statistics of all SQL statements executed';


--
-- TOC entry 13 (class 3079 OID 16812)
-- Name: pg_trgm; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pg_trgm WITH SCHEMA public;


--
-- TOC entry 4047 (class 0 OID 0)
-- Dependencies: 13
-- Name: EXTENSION pg_trgm; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pg_trgm IS 'text similarity measurement and index searching based on trigrams';


--
-- TOC entry 14 (class 3079 OID 16775)
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- TOC entry 4048 (class 0 OID 0)
-- Dependencies: 14
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


--
-- TOC entry 8 (class 3079 OID 17571)
-- Name: pgrowlocks; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgrowlocks WITH SCHEMA public;


--
-- TOC entry 4049 (class 0 OID 0)
-- Dependencies: 8
-- Name: EXTENSION pgrowlocks; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgrowlocks IS 'show row-level locking information';


--
-- TOC entry 19 (class 3079 OID 16619)
-- Name: pgstattuple; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgstattuple WITH SCHEMA public;


--
-- TOC entry 4050 (class 0 OID 0)
-- Dependencies: 19
-- Name: EXTENSION pgstattuple; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgstattuple IS 'show tuple-level statistics';


--
-- TOC entry 18 (class 3079 OID 16629)
-- Name: tablefunc; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS tablefunc WITH SCHEMA public;


--
-- TOC entry 4051 (class 0 OID 0)
-- Dependencies: 18
-- Name: EXTENSION tablefunc; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION tablefunc IS 'functions that manipulate whole tables, including crosstab';


--
-- TOC entry 3 (class 3079 OID 18304)
-- Name: unaccent; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS unaccent WITH SCHEMA public;


--
-- TOC entry 4052 (class 0 OID 0)
-- Dependencies: 3
-- Name: EXTENSION unaccent; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION unaccent IS 'text search dictionary that removes accents';


--
-- TOC entry 15 (class 3079 OID 16764)
-- Name: uuid-ossp; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS "uuid-ossp" WITH SCHEMA public;


--
-- TOC entry 4053 (class 0 OID 0)
-- Dependencies: 15
-- Name: EXTENSION "uuid-ossp"; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION "uuid-ossp" IS 'generate universally unique identifiers (UUIDs)';


--
-- TOC entry 21 (class 3079 OID 16430)
-- Name: xml2; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS xml2 WITH SCHEMA public;


--
-- TOC entry 4054 (class 0 OID 0)
-- Dependencies: 21
-- Name: EXTENSION xml2; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION xml2 IS 'XPath querying and XSLT';


SET default_tablespace = '';

--
-- TOC entry 225 (class 1259 OID 13183611)
-- Name: excersise_groups; Type: TABLE; Schema: public; Owner: rwpacljg
--

CREATE TABLE public.excersise_groups (
    id integer NOT NULL,
    owner_id integer NOT NULL,
    name character varying(255) NOT NULL
);


ALTER TABLE public.excersise_groups OWNER TO rwpacljg;

--
-- TOC entry 224 (class 1259 OID 13183609)
-- Name: excersise_groups_id_seq; Type: SEQUENCE; Schema: public; Owner: rwpacljg
--

ALTER TABLE public.excersise_groups ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.excersise_groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 227 (class 1259 OID 13184009)
-- Name: excersises; Type: TABLE; Schema: public; Owner: rwpacljg
--

CREATE TABLE public.excersises (
    id integer NOT NULL,
    group_id integer NOT NULL,
    name character varying(255) NOT NULL,
    date timestamp with time zone NOT NULL,
    weight double precision NOT NULL,
    reps integer NOT NULL,
    sets integer NOT NULL
);


ALTER TABLE public.excersises OWNER TO rwpacljg;

--
-- TOC entry 226 (class 1259 OID 13184007)
-- Name: excersises_id_seq; Type: SEQUENCE; Schema: public; Owner: rwpacljg
--

ALTER TABLE public.excersises ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.excersises_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 223 (class 1259 OID 13179123)
-- Name: users; Type: TABLE; Schema: public; Owner: rwpacljg
--

CREATE TABLE public.users (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    username character varying(255) NOT NULL
);


ALTER TABLE public.users OWNER TO rwpacljg;

--
-- TOC entry 222 (class 1259 OID 13179121)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: rwpacljg
--

ALTER TABLE public.users ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 4025 (class 0 OID 13183611)
-- Dependencies: 225
-- Data for Name: excersise_groups; Type: TABLE DATA; Schema: public; Owner: rwpacljg
--

COPY public.excersise_groups (id, owner_id, name) FROM stdin;
1	1	Test 1
2	1	Test 2
3	1	Test 3
4	1	Test 4
5	1	Test group
6	1	Test group excersise
7	1	Test group excersise
8	1	New test group
9	1	New test group
12	2	Ciag
\.


--
-- TOC entry 4027 (class 0 OID 13184009)
-- Dependencies: 227
-- Data for Name: excersises; Type: TABLE DATA; Schema: public; Owner: rwpacljg
--

COPY public.excersises (id, group_id, name, date, weight, reps, sets) FROM stdin;
1	1	Test ex	2023-05-24 13:29:22.987195+00	25.1999999999999993	8	3
2	1	Test ex	2023-05-24 13:29:26.09407+00	25.1999999999999993	8	3
3	1	Test ex	2023-05-24 13:29:28.844186+00	25.1999999999999993	8	3
4	2	Test ex 2	2023-05-24 13:29:33.501431+00	25.1999999999999993	8	3
5	2	Test ex 2	2023-05-24 13:29:36.194885+00	25.1999999999999993	8	3
\.


--
-- TOC entry 4023 (class 0 OID 13179123)
-- Dependencies: 223
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: rwpacljg
--

COPY public.users (id, email, password, username) FROM stdin;
1	murawus@gmail.com	$2y$10$cSA.RZbI8HMMpAytyzziW.wI4ixw/9mV1M2huZ8rjnvw/G3d7qdWm	Murawus
2	borowieckimateusz1@gmail.com	$2y$10$z/.cuzzWqOhmDe26RcBM3OUOosxmsujMi7k0n0PYQNgYlWpfv7ccu	Murawus2
3	murawus3@gmail.com	$2y$10$6yD1HRLwGwzUdP22DTk5kO01eMtIBIiZzvA9leJUK78r/7krMJJHq	Murawus3
\.


--
-- TOC entry 4055 (class 0 OID 0)
-- Dependencies: 224
-- Name: excersise_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rwpacljg
--

SELECT pg_catalog.setval('public.excersise_groups_id_seq', 12, true);


--
-- TOC entry 4056 (class 0 OID 0)
-- Dependencies: 226
-- Name: excersises_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rwpacljg
--

SELECT pg_catalog.setval('public.excersises_id_seq', 7, true);


--
-- TOC entry 4057 (class 0 OID 0)
-- Dependencies: 222
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rwpacljg
--

SELECT pg_catalog.setval('public.users_id_seq', 3, true);


--
-- TOC entry 3895 (class 2606 OID 13183615)
-- Name: excersise_groups excersise_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: rwpacljg
--

ALTER TABLE ONLY public.excersise_groups
    ADD CONSTRAINT excersise_groups_pkey PRIMARY KEY (id);


--
-- TOC entry 3897 (class 2606 OID 13184013)
-- Name: excersises excersises_pkey; Type: CONSTRAINT; Schema: public; Owner: rwpacljg
--

ALTER TABLE ONLY public.excersises
    ADD CONSTRAINT excersises_pkey PRIMARY KEY (id);


--
-- TOC entry 3893 (class 2606 OID 13179130)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: rwpacljg
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3899 (class 2606 OID 13184014)
-- Name: excersises group_id; Type: FK CONSTRAINT; Schema: public; Owner: rwpacljg
--

ALTER TABLE ONLY public.excersises
    ADD CONSTRAINT group_id FOREIGN KEY (group_id) REFERENCES public.excersise_groups(id);


--
-- TOC entry 3898 (class 2606 OID 13183616)
-- Name: excersise_groups owner_id; Type: FK CONSTRAINT; Schema: public; Owner: rwpacljg
--

ALTER TABLE ONLY public.excersise_groups
    ADD CONSTRAINT owner_id FOREIGN KEY (owner_id) REFERENCES public.users(id);


--
-- TOC entry 4033 (class 0 OID 0)
-- Dependencies: 27
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2023-05-27 17:04:22 CEST

--
-- PostgreSQL database dump complete
--

