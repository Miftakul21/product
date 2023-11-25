--
-- PostgreSQL database dump
--

-- Dumped from database version 16.0
-- Dumped by pg_dump version 16.0

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: kategori; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kategori (
    id_kategori integer NOT NULL,
    nama_kategori text NOT NULL
);


ALTER TABLE public.kategori OWNER TO postgres;

--
-- Name: kategori_id_kategori_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.kategori_id_kategori_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.kategori_id_kategori_seq OWNER TO postgres;

--
-- Name: kategori_id_kategori_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kategori_id_kategori_seq OWNED BY public.kategori.id_kategori;


--
-- Name: produk; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produk (
    id_produk integer NOT NULL,
    nama_produk text NOT NULL,
    harga integer NOT NULL,
    kategori_id integer,
    status_id integer
);


ALTER TABLE public.produk OWNER TO postgres;

--
-- Name: product_id_produk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_id_produk_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.product_id_produk_seq OWNER TO postgres;

--
-- Name: product_id_produk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_id_produk_seq OWNED BY public.produk.id_produk;


--
-- Name: status; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status (
    id_status integer NOT NULL,
    nama_status text NOT NULL
);


ALTER TABLE public.status OWNER TO postgres;

--
-- Name: status_id_status_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.status_id_status_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.status_id_status_seq OWNER TO postgres;

--
-- Name: status_id_status_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.status_id_status_seq OWNED BY public.status.id_status;


--
-- Name: token_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.token_user (
    id_token integer NOT NULL,
    email_user text NOT NULL,
    _token text
);


ALTER TABLE public.token_user OWNER TO postgres;

--
-- Name: token_user_id_token_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.token_user_id_token_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.token_user_id_token_seq OWNER TO postgres;

--
-- Name: token_user_id_token_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.token_user_id_token_seq OWNED BY public.token_user.id_token;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    nama character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    role character(20) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_user_seq OWNER TO postgres;

--
-- Name: users_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_user_seq OWNED BY public.users.id_user;


--
-- Name: kategori id_kategori; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kategori ALTER COLUMN id_kategori SET DEFAULT nextval('public.kategori_id_kategori_seq'::regclass);


--
-- Name: produk id_produk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produk ALTER COLUMN id_produk SET DEFAULT nextval('public.product_id_produk_seq'::regclass);


--
-- Name: status id_status; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status ALTER COLUMN id_status SET DEFAULT nextval('public.status_id_status_seq'::regclass);


--
-- Name: token_user id_token; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.token_user ALTER COLUMN id_token SET DEFAULT nextval('public.token_user_id_token_seq'::regclass);


--
-- Name: users id_user; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.users_id_user_seq'::regclass);


--
-- Data for Name: kategori; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kategori (id_kategori, nama_kategori) FROM stdin;
19	L QUEENLY
20	L MTH AKSESORIS (IM)
22	L MTH TABUNG (LK)
23	SP MTH SPAREPART (LK)
24	CI MTH TINTA LAIN (IM)
25	S MTH STEMPEL (IM)
\.


--
-- Data for Name: produk; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produk (id_produk, nama_produk, harga, kategori_id, status_id) FROM stdin;
29	ALCOHOL GEL POLISH CLEANSER GP-CLN01	12500	19	24
30	ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM	1000	20	24
31	ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM	1000	20	24
32	ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM	12500	20	24
33	ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM	1000	20	24
35	ALUMUNIUM FOIL PET SHEET 250mm IM	1000	20	26
36	ARM PENDEK MODEL U	3000	20	24
37	ARM SUPPORT KECIL	13000	22	26
38	ARM SUPPORT KOTAK PUTIH	13000	20	26
34	ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM	13000	20	26
39	ARM SUPPORT PENDEK POLOS	13000	22	24
\.


--
-- Data for Name: status; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.status (id_status, nama_status) FROM stdin;
24	Bisa dijual
26	Tidak bisa dijual
\.


--
-- Data for Name: token_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.token_user (id_token, email_user, _token) FROM stdin;
2	miftahuda@gmail.com	eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im1pZnRhaHVkYUBnbWFpbC5jb20iLCJsYXQiOjE3MDA3NDI1NTUsImV4cCI6MTcwMDc0NjE1NX0.-Oe-r0bihcgNBlwxh3fDGsurKNVBxdL0-j66HlHvjz4
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id_user, nama, email, password, role) FROM stdin;
4	Miftakul Huda	miftahuda@gmail.com	$2y$10$/1yBfjRZOiuvBsmyZOxz.uDKf6mlhfl.ZKFy0XnLWYsD9EOc/MljS	admin               
5	Dwi Sri	dwisri@gmail.com	$2y$10$B4o0RVdUr/lvM8buv3eRluIXh0UdEq9xwEsQaskSj80qTL.FBaa5u	admin               
\.


--
-- Name: kategori_id_kategori_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kategori_id_kategori_seq', 26, true);


--
-- Name: product_id_produk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_id_produk_seq', 39, true);


--
-- Name: status_id_status_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_id_status_seq', 26, true);


--
-- Name: token_user_id_token_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.token_user_id_token_seq', 2, true);


--
-- Name: users_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_user_seq', 5, true);


--
-- Name: kategori kategori_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kategori
    ADD CONSTRAINT kategori_pkey PRIMARY KEY (id_kategori);


--
-- Name: produk product_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produk
    ADD CONSTRAINT product_pkey PRIMARY KEY (id_produk);


--
-- Name: status status_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status
    ADD CONSTRAINT status_pkey PRIMARY KEY (id_status);


--
-- Name: token_user token_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.token_user
    ADD CONSTRAINT token_user_pkey PRIMARY KEY (id_token);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- Name: produk fk_kategori; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produk
    ADD CONSTRAINT fk_kategori FOREIGN KEY (kategori_id) REFERENCES public.kategori(id_kategori) ON DELETE SET NULL;


--
-- PostgreSQL database dump complete
--

