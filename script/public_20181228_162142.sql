--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5 (Ubuntu 10.5-0ubuntu0.18.04)
-- Dumped by pg_dump version 11.0

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- Name: setluggagetopassenger(); Type: FUNCTION; Schema: public; Owner: homestead
--

CREATE FUNCTION public.setluggagetopassenger() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
        BEGIN
            INSERT INTO luggages(id, weight, cost, type, passenger_id, created_at, updated_at)
            VALUES (NEW.id, 0, 0, 'No posee equipaje', NEW.id, now(), null);
            RETURN NEW;
        END
        $$;


ALTER FUNCTION public.setluggagetopassenger() OWNER TO homestead;

--
-- Name: setpaymenttopurchase_order(); Type: FUNCTION; Schema: public; Owner: homestead
--

CREATE FUNCTION public.setpaymenttopurchase_order() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
        BEGIN
            INSERT INTO payments(id, type, bank, count,quotas, purchase_order_id, created_at, updated_at)
            VALUES (NEW.id, null, null, null, 0, NEW.id, now(), null);
            RETURN NEW;
        END
        $$;


ALTER FUNCTION public.setpaymenttopurchase_order() OWNER TO homestead;

--
-- Name: setstatetoflight(); Type: FUNCTION; Schema: public; Owner: homestead
--

CREATE FUNCTION public.setstatetoflight() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
        BEGIN
            INSERT INTO states(id, condition, flight_id, created_at, updated_at)
            VALUES (NEW.id, 'Pendiente', NEW.id, now(), null);
            RETURN NEW;
        END
        $$;


ALTER FUNCTION public.setstatetoflight() OWNER TO homestead;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: airplanes; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.airplanes (
    id integer NOT NULL,
    capacity integer NOT NULL,
    name character varying(255) NOT NULL,
    flight_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.airplanes OWNER TO homestead;

--
-- Name: airplanes_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.airplanes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.airplanes_id_seq OWNER TO homestead;

--
-- Name: airplanes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.airplanes_id_seq OWNED BY public.airplanes.id;


--
-- Name: car_reservations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.car_reservations (
    id integer NOT NULL,
    cost integer NOT NULL,
    begin_date timestamp(0) without time zone NOT NULL,
    end_date timestamp(0) without time zone NOT NULL,
    purchase_order_id integer NOT NULL,
    package_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.car_reservations OWNER TO homestead;

--
-- Name: car_reservations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.car_reservations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.car_reservations_id_seq OWNER TO homestead;

--
-- Name: car_reservations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.car_reservations_id_seq OWNED BY public.car_reservations.id;


--
-- Name: cars; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.cars (
    id integer NOT NULL,
    capacity integer NOT NULL,
    patent character varying(255) NOT NULL,
    city_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.cars OWNER TO homestead;

--
-- Name: cars_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.cars_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cars_id_seq OWNER TO homestead;

--
-- Name: cars_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.cars_id_seq OWNED BY public.cars.id;


--
-- Name: cities; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.cities (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    airport_name character varying(255) NOT NULL,
    country_id integer NOT NULL
);


ALTER TABLE public.cities OWNER TO homestead;

--
-- Name: cities_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.cities_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cities_id_seq OWNER TO homestead;

--
-- Name: cities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.cities_id_seq OWNED BY public.cities.id;


--
-- Name: countries; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.countries (
    id integer NOT NULL,
    name character varying(255) NOT NULL
);


ALTER TABLE public.countries OWNER TO homestead;

--
-- Name: countries_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.countries_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.countries_id_seq OWNER TO homestead;

--
-- Name: countries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.countries_id_seq OWNED BY public.countries.id;


--
-- Name: flights; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.flights (
    id integer NOT NULL,
    platform integer NOT NULL,
    begin_date timestamp(0) without time zone,
    end_date timestamp(0) without time zone,
    origin_id integer NOT NULL,
    destination_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.flights OWNER TO homestead;

--
-- Name: flights_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.flights_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.flights_id_seq OWNER TO homestead;

--
-- Name: flights_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.flights_id_seq OWNED BY public.flights.id;


--
-- Name: hotels; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.hotels (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    stars integer NOT NULL,
    capacity integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.hotels OWNER TO homestead;

--
-- Name: hotels_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.hotels_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hotels_id_seq OWNER TO homestead;

--
-- Name: hotels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.hotels_id_seq OWNED BY public.hotels.id;


--
-- Name: insurance_reservations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.insurance_reservations (
    id integer NOT NULL,
    cost integer NOT NULL,
    begin_date timestamp(0) without time zone NOT NULL,
    end_date timestamp(0) without time zone NOT NULL,
    purchase_order_id integer NOT NULL,
    package_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.insurance_reservations OWNER TO homestead;

--
-- Name: insurance_reservations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.insurance_reservations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.insurance_reservations_id_seq OWNER TO homestead;

--
-- Name: insurance_reservations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.insurance_reservations_id_seq OWNED BY public.insurance_reservations.id;


--
-- Name: insurances; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.insurances (
    id integer NOT NULL,
    edad integer NOT NULL,
    type character varying(255) NOT NULL,
    city character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.insurances OWNER TO homestead;

--
-- Name: insurances_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.insurances_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.insurances_id_seq OWNER TO homestead;

--
-- Name: insurances_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.insurances_id_seq OWNED BY public.insurances.id;


--
-- Name: luggages; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.luggages (
    id integer NOT NULL,
    weight integer NOT NULL,
    cost integer NOT NULL,
    type character varying(255) NOT NULL,
    passenger_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.luggages OWNER TO homestead;

--
-- Name: luggages_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.luggages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.luggages_id_seq OWNER TO homestead;

--
-- Name: luggages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.luggages_id_seq OWNED BY public.luggages.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO homestead;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO homestead;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: package_reservations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.package_reservations (
    id integer NOT NULL,
    cost integer NOT NULL,
    begin_date timestamp(0) without time zone NOT NULL,
    end_date timestamp(0) without time zone NOT NULL,
    purchase_order_id integer NOT NULL,
    package_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.package_reservations OWNER TO homestead;

--
-- Name: package_reservations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.package_reservations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.package_reservations_id_seq OWNER TO homestead;

--
-- Name: package_reservations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.package_reservations_id_seq OWNED BY public.package_reservations.id;


--
-- Name: packages; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.packages (
    id integer NOT NULL,
    quantity integer NOT NULL,
    name character varying(255) NOT NULL,
    cost integer NOT NULL,
    nights integer NOT NULL,
    origin_id integer NOT NULL,
    destination_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.packages OWNER TO homestead;

--
-- Name: packages_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.packages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.packages_id_seq OWNER TO homestead;

--
-- Name: packages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.packages_id_seq OWNED BY public.packages.id;


--
-- Name: passengers; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.passengers (
    id integer NOT NULL,
    rut character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    ticket_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.passengers OWNER TO homestead;

--
-- Name: passengers_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.passengers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.passengers_id_seq OWNER TO homestead;

--
-- Name: passengers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.passengers_id_seq OWNED BY public.passengers.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO homestead;

--
-- Name: payments; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.payments (
    id integer NOT NULL,
    type character varying(255),
    bank character varying(255),
    count character varying(255),
    quotas integer NOT NULL,
    purchase_order_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.payments OWNER TO homestead;

--
-- Name: payments_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.payments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.payments_id_seq OWNER TO homestead;

--
-- Name: payments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.payments_id_seq OWNED BY public.payments.id;


--
-- Name: purchase_orders; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.purchase_orders (
    id integer NOT NULL,
    cost integer NOT NULL,
    date timestamp(0) without time zone NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.purchase_orders OWNER TO homestead;

--
-- Name: purchase_orders_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.purchase_orders_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.purchase_orders_id_seq OWNER TO homestead;

--
-- Name: purchase_orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.purchase_orders_id_seq OWNED BY public.purchase_orders.id;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.roles (
    id integer NOT NULL,
    type character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO homestead;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.roles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO homestead;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: room_reservations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.room_reservations (
    id integer NOT NULL,
    cost integer NOT NULL,
    begin_date timestamp(0) without time zone NOT NULL,
    end_date timestamp(0) without time zone NOT NULL,
    purchase_order_id integer NOT NULL,
    package_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.room_reservations OWNER TO homestead;

--
-- Name: room_reservations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.room_reservations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.room_reservations_id_seq OWNER TO homestead;

--
-- Name: room_reservations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.room_reservations_id_seq OWNED BY public.room_reservations.id;


--
-- Name: rooms; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.rooms (
    id integer NOT NULL,
    number integer NOT NULL,
    capacity integer NOT NULL,
    cost integer NOT NULL,
    type character varying(255) NOT NULL,
    hotel_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.rooms OWNER TO homestead;

--
-- Name: rooms_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.rooms_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rooms_id_seq OWNER TO homestead;

--
-- Name: rooms_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.rooms_id_seq OWNED BY public.rooms.id;


--
-- Name: seats; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.seats (
    id integer NOT NULL,
    number integer NOT NULL,
    type character varying(255) NOT NULL,
    remaining integer NOT NULL,
    ticket_id integer NOT NULL,
    airplane_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.seats OWNER TO homestead;

--
-- Name: seats_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.seats_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seats_id_seq OWNER TO homestead;

--
-- Name: seats_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.seats_id_seq OWNED BY public.seats.id;


--
-- Name: states; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.states (
    id integer NOT NULL,
    condition character varying(255) NOT NULL,
    flight_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.states OWNER TO homestead;

--
-- Name: states_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.states_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.states_id_seq OWNER TO homestead;

--
-- Name: states_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.states_id_seq OWNED BY public.states.id;


--
-- Name: ticket_reservations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.ticket_reservations (
    id integer NOT NULL,
    cost integer NOT NULL,
    purchase_order_id integer NOT NULL,
    package_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.ticket_reservations OWNER TO homestead;

--
-- Name: ticket_reservations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.ticket_reservations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ticket_reservations_id_seq OWNER TO homestead;

--
-- Name: ticket_reservations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.ticket_reservations_id_seq OWNED BY public.ticket_reservations.id;


--
-- Name: tickets; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.tickets (
    id integer NOT NULL,
    cost integer NOT NULL,
    quantity_passengers integer NOT NULL,
    flight_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tickets OWNER TO homestead;

--
-- Name: tickets_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.tickets_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tickets_id_seq OWNER TO homestead;

--
-- Name: tickets_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.tickets_id_seq OWNED BY public.tickets.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    miles integer NOT NULL,
    rut character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    role_id integer NOT NULL
);


ALTER TABLE public.users OWNER TO homestead;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO homestead;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: airplanes id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.airplanes ALTER COLUMN id SET DEFAULT nextval('public.airplanes_id_seq'::regclass);


--
-- Name: car_reservations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.car_reservations ALTER COLUMN id SET DEFAULT nextval('public.car_reservations_id_seq'::regclass);


--
-- Name: cars id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cars ALTER COLUMN id SET DEFAULT nextval('public.cars_id_seq'::regclass);


--
-- Name: cities id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cities ALTER COLUMN id SET DEFAULT nextval('public.cities_id_seq'::regclass);


--
-- Name: countries id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.countries ALTER COLUMN id SET DEFAULT nextval('public.countries_id_seq'::regclass);


--
-- Name: flights id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flights ALTER COLUMN id SET DEFAULT nextval('public.flights_id_seq'::regclass);


--
-- Name: hotels id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotels ALTER COLUMN id SET DEFAULT nextval('public.hotels_id_seq'::regclass);


--
-- Name: insurance_reservations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.insurance_reservations ALTER COLUMN id SET DEFAULT nextval('public.insurance_reservations_id_seq'::regclass);


--
-- Name: insurances id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.insurances ALTER COLUMN id SET DEFAULT nextval('public.insurances_id_seq'::regclass);


--
-- Name: luggages id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.luggages ALTER COLUMN id SET DEFAULT nextval('public.luggages_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: package_reservations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.package_reservations ALTER COLUMN id SET DEFAULT nextval('public.package_reservations_id_seq'::regclass);


--
-- Name: packages id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.packages ALTER COLUMN id SET DEFAULT nextval('public.packages_id_seq'::regclass);


--
-- Name: passengers id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.passengers ALTER COLUMN id SET DEFAULT nextval('public.passengers_id_seq'::regclass);


--
-- Name: payments id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.payments ALTER COLUMN id SET DEFAULT nextval('public.payments_id_seq'::regclass);


--
-- Name: purchase_orders id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.purchase_orders ALTER COLUMN id SET DEFAULT nextval('public.purchase_orders_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: room_reservations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.room_reservations ALTER COLUMN id SET DEFAULT nextval('public.room_reservations_id_seq'::regclass);


--
-- Name: rooms id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.rooms ALTER COLUMN id SET DEFAULT nextval('public.rooms_id_seq'::regclass);


--
-- Name: seats id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.seats ALTER COLUMN id SET DEFAULT nextval('public.seats_id_seq'::regclass);


--
-- Name: states id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.states ALTER COLUMN id SET DEFAULT nextval('public.states_id_seq'::regclass);


--
-- Name: ticket_reservations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.ticket_reservations ALTER COLUMN id SET DEFAULT nextval('public.ticket_reservations_id_seq'::regclass);


--
-- Name: tickets id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets ALTER COLUMN id SET DEFAULT nextval('public.tickets_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: airplanes; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.airplanes VALUES (1, 4, 'Mose Paucek DVM', 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.airplanes VALUES (2, 87, 'Braxton Carroll II', 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.airplanes VALUES (3, 54, 'Lora Rodriguez', 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.airplanes VALUES (4, 96, 'Armando Crooks', 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.airplanes VALUES (5, 28, 'Dr. Warren Lynch PhD', 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.airplanes VALUES (6, 90, 'Miss Jazlyn Stark', 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.airplanes VALUES (7, 20, 'Miss Linda Dickens II', 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.airplanes VALUES (8, 23, 'Shakira Kris DVM', 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.airplanes VALUES (9, 34, 'Tristin Reynolds', 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.airplanes VALUES (10, 44, 'Prof. Gerardo Parisian', 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');


--
-- Data for Name: car_reservations; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.car_reservations VALUES (1, 22518, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 79, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (2, 16498, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 58, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (3, 5366, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 82, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (4, 9204, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 92, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (5, 9955, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 85, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (6, 2370, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 36, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (7, 10935, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 78, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (8, 12379, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 56, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (9, 25049, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 82, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (10, 16614, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 18, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (11, 5237, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 50, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (12, 7794, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 31, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (13, 10788, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (14, 26303, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 76, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (15, 6799, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 29, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (16, 24759, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 90, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (17, 9505, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 80, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (18, 10845, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 40, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (19, 5807, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 64, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (20, 12598, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 42, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (21, 21372, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 77, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (22, 28375, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 20, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (23, 16793, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 50, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (24, 8096, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 43, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (25, 10825, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (26, 12099, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (27, 27800, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 58, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (28, 13195, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 24, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (29, 6787, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 82, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (30, 8398, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 84, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (31, 28207, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 93, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (32, 14354, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 82, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (33, 21641, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 49, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (34, 26712, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 17, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (35, 8268, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 53, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (36, 10804, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 74, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (37, 17129, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 78, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (38, 21307, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 76, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (39, 16066, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 42, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (40, 9390, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 63, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (41, 28783, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 54, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (42, 21305, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 29, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (43, 24682, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 83, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (44, 23970, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 97, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (45, 7972, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 35, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (46, 4886, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 98, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (47, 18443, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 26, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (48, 12924, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 50, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (49, 5268, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 92, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.car_reservations VALUES (50, 3454, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 25, '2018-12-28 19:18:39', '2018-12-28 19:18:39');


--
-- Data for Name: cars; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.cars VALUES (1, 7, '03yisr', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.cars VALUES (2, 5, '69qnsn', 9, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.cars VALUES (3, 8, '80szhp', 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.cars VALUES (4, 5, '17qjfu', 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.cars VALUES (5, 5, '25qmkl', 10, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.cars VALUES (6, 8, '03avvj', 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.cars VALUES (7, 5, '11cbwp', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.cars VALUES (8, 6, '81bmag', 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.cars VALUES (9, 7, '17tvgb', 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.cars VALUES (10, 8, '22hris', 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');


--
-- Data for Name: cities; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.cities VALUES (1, 'Santiago', 'Arturo Merino Benitez', 1);
INSERT INTO public.cities VALUES (2, 'Temuco', 'Aeropuerto Internacional La Araucania', 1);
INSERT INTO public.cities VALUES (3, 'Jauja', 'Francisco Carlé', 2);
INSERT INTO public.cities VALUES (4, 'Lima', 'Jorge Chávez ', 2);
INSERT INTO public.cities VALUES (5, 'Buenos Aires', 'Aeropuerto Internacional Ezeiza', 3);
INSERT INTO public.cities VALUES (6, 'San Carlos de Bariloche', 'Aeropuerto Internacional de Bariloche Tte. Luis Candelaria', 3);
INSERT INTO public.cities VALUES (7, 'Rio de Janeiro', 'Aeropuerto Internacional de Galeão', 4);
INSERT INTO public.cities VALUES (8, 'Brasilia', 'Aeropuerto Internacional Presidente Juscelino Kubitschek', 4);
INSERT INTO public.cities VALUES (9, 'New York', 'Aeropuerto Internacional John F. Kennedy', 5);
INSERT INTO public.cities VALUES (10, 'Los Angeles', 'Aeropuerto Internacional de Los Angeles', 5);


--
-- Data for Name: countries; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.countries VALUES (1, 'Chile');
INSERT INTO public.countries VALUES (2, 'Peru');
INSERT INTO public.countries VALUES (3, 'Argentina');
INSERT INTO public.countries VALUES (4, 'Brasil');
INSERT INTO public.countries VALUES (5, 'Estados Unidos');


--
-- Data for Name: flights; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.flights VALUES (1, 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 4, 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.flights VALUES (2, 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 2, 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.flights VALUES (3, 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 2, 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.flights VALUES (4, 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 4, 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.flights VALUES (5, 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 2, 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.flights VALUES (6, 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 5, 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.flights VALUES (7, 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 4, 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.flights VALUES (8, 9, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 4, 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.flights VALUES (9, 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 3, 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.flights VALUES (10, 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38', 4, 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');


--
-- Data for Name: hotels; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.hotels VALUES (1, 'Bayer', 3, 75, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.hotels VALUES (2, 'Boehm', 3, 52, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.hotels VALUES (3, 'Hoppe', 4, 56, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.hotels VALUES (4, 'Dare', 3, 76, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.hotels VALUES (5, 'Steuber', 3, 61, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.hotels VALUES (6, 'Thiel', 4, 46, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.hotels VALUES (7, 'Pacocha', 1, 39, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.hotels VALUES (8, 'McGlynn', 4, 44, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.hotels VALUES (9, 'Aufderhar', 3, 31, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.hotels VALUES (10, 'Strosin', 1, 44, '2018-12-28 19:18:38', '2018-12-28 19:18:38');


--
-- Data for Name: insurance_reservations; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.insurance_reservations VALUES (1, 142334, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 94, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (2, 32033, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 58, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (3, 93154, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 67, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (4, 57668, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 80, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (5, 34364, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (6, 129852, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 92, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (7, 91414, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 35, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (8, 141400, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 20, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (9, 147757, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 32, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (10, 31443, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (11, 95777, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 98, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (12, 90885, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 39, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (13, 145548, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 37, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (14, 36248, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 50, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (15, 61854, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 59, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (16, 92713, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 74, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (17, 101185, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 40, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (18, 123944, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 37, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (19, 81813, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 72, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (20, 149892, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 27, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (21, 116356, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 18, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (22, 128136, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 69, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (23, 35826, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 28, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (24, 141372, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 61, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (25, 80706, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 24, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (26, 67776, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 32, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (27, 149475, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 40, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (28, 135898, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 83, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (29, 77847, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 30, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (30, 84343, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 57, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (31, 60638, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 17, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (32, 75527, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 83, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (33, 116076, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 94, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (34, 74786, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (35, 79216, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 60, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (36, 45462, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 94, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (37, 117097, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 17, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (38, 119067, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (39, 92520, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 38, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (40, 59049, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 14, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (41, 140556, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 87, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (42, 39174, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 38, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (43, 140820, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 3, 46, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.insurance_reservations VALUES (44, 46052, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 52, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.insurance_reservations VALUES (45, 42796, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 2, 46, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.insurance_reservations VALUES (46, 123511, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 49, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.insurance_reservations VALUES (47, 117013, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 15, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.insurance_reservations VALUES (48, 43243, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 5, 69, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.insurance_reservations VALUES (49, 92185, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 1, 26, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.insurance_reservations VALUES (50, 95022, '2018-12-28 19:18:39', '2018-12-28 19:18:39', 4, 55, '2018-12-28 19:18:40', '2018-12-28 19:18:40');


--
-- Data for Name: insurances; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.insurances VALUES (1, 40, 'Viaje', 'North Uriah', '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.insurances VALUES (2, 37, 'Viaje', 'Hermistonhaven', '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.insurances VALUES (3, 85, 'Viaje', 'West Jacquesmouth', '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.insurances VALUES (4, 27, 'Catastrofe', 'South Albashire', '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.insurances VALUES (5, 7, 'Viaje', 'Jenningsburgh', '2018-12-28 19:18:38', '2018-12-28 19:18:38');


--
-- Data for Name: luggages; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.luggages VALUES (1, 0, 0, 'No posee equipaje', 1, '2018-12-28 19:18:39', NULL);
INSERT INTO public.luggages VALUES (2, 0, 0, 'No posee equipaje', 2, '2018-12-28 19:18:39', NULL);
INSERT INTO public.luggages VALUES (3, 0, 0, 'No posee equipaje', 3, '2018-12-28 19:18:39', NULL);
INSERT INTO public.luggages VALUES (4, 0, 0, 'No posee equipaje', 4, '2018-12-28 19:18:39', NULL);
INSERT INTO public.luggages VALUES (5, 0, 0, 'No posee equipaje', 5, '2018-12-28 19:18:39', NULL);
INSERT INTO public.luggages VALUES (6, 0, 0, 'No posee equipaje', 6, '2018-12-28 19:18:39', NULL);
INSERT INTO public.luggages VALUES (7, 0, 0, 'No posee equipaje', 7, '2018-12-28 19:18:39', NULL);
INSERT INTO public.luggages VALUES (8, 0, 0, 'No posee equipaje', 8, '2018-12-28 19:18:39', NULL);
INSERT INTO public.luggages VALUES (9, 0, 0, 'No posee equipaje', 9, '2018-12-28 19:18:39', NULL);
INSERT INTO public.luggages VALUES (10, 0, 0, 'No posee equipaje', 10, '2018-12-28 19:18:39', NULL);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.migrations VALUES (1, '2013_12_23_232554_create_roles_table', 1);
INSERT INTO public.migrations VALUES (2, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO public.migrations VALUES (4, '2018_12_23_232312_create_hotels_table', 1);
INSERT INTO public.migrations VALUES (5, '2018_12_23_232503_create_rooms_table', 1);
INSERT INTO public.migrations VALUES (6, '2018_12_23_232511_create_countries_table', 1);
INSERT INTO public.migrations VALUES (7, '2018_12_23_232512_create_cities_table', 1);
INSERT INTO public.migrations VALUES (8, '2018_12_23_232513_create_packages_table', 1);
INSERT INTO public.migrations VALUES (9, '2018_12_23_232534_create_purchase_orders_table', 1);
INSERT INTO public.migrations VALUES (10, '2018_12_23_232535_create_room_reservations_table', 1);
INSERT INTO public.migrations VALUES (11, '2018_12_23_232651_create_insurance_reservations_table', 1);
INSERT INTO public.migrations VALUES (12, '2018_12_23_232700_create_insurances_table', 1);
INSERT INTO public.migrations VALUES (13, '2018_12_23_233013_create_car_reservations_table', 1);
INSERT INTO public.migrations VALUES (14, '2018_12_23_233050_create_package_reservations_table', 1);
INSERT INTO public.migrations VALUES (15, '2018_12_23_233152_create_flights_table', 1);
INSERT INTO public.migrations VALUES (16, '2018_12_23_233200_create_states_table', 1);
INSERT INTO public.migrations VALUES (17, '2018_12_23_233238_create_ticket_reservations_table', 1);
INSERT INTO public.migrations VALUES (18, '2018_12_23_233308_create_cars_table', 1);
INSERT INTO public.migrations VALUES (19, '2018_12_23_233331_create_tickets_table', 1);
INSERT INTO public.migrations VALUES (20, '2018_12_23_233848_create_passengers_table', 1);
INSERT INTO public.migrations VALUES (21, '2018_12_23_233917_create_luggages_table', 1);
INSERT INTO public.migrations VALUES (22, '2018_12_23_233920_create_airplanes_table', 1);
INSERT INTO public.migrations VALUES (23, '2018_12_23_233937_create_seats_table', 1);
INSERT INTO public.migrations VALUES (24, '2018_12_23_234118_create_payments_table', 1);
INSERT INTO public.migrations VALUES (25, '2018_12_28_025933_fligth_state_trigger', 1);
INSERT INTO public.migrations VALUES (26, '2018_12_28_051122_passenger_luggage_trigger', 1);
INSERT INTO public.migrations VALUES (27, '2018_12_28_174912_purchase_order_payment_trigger', 1);


--
-- Data for Name: package_reservations; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.package_reservations VALUES (1, 68904, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 53, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (2, 61442, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 35, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (3, 99012, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 7, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (4, 35210, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 44, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (5, 120303, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 76, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (6, 31072, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 47, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (7, 131526, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 22, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (8, 81847, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 76, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (9, 97363, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 51, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (10, 55697, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 10, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (11, 42332, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 72, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (12, 110855, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 58, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (13, 111432, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 29, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (14, 121168, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 49, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (15, 120978, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 81, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (16, 129058, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 69, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (17, 68918, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 63, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (18, 51231, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 12, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (19, 129543, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 54, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (20, 122076, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 44, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (21, 112647, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 24, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (22, 99086, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 79, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (23, 141628, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 80, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (24, 76230, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 99, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (25, 35405, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 64, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (26, 128585, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 9, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (27, 99804, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 89, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (28, 98501, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 26, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (29, 136687, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 69, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (30, 135669, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 73, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (31, 47671, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 56, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (32, 64087, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 91, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (33, 108820, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 52, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (34, 95022, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 12, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (35, 108586, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 97, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (36, 70427, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 1, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (37, 86757, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 85, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (38, 103940, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 29, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (39, 87105, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 99, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (40, 106211, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 36, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (41, 67358, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 63, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (42, 97821, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 62, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (43, 123459, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 46, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (44, 97645, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 20, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (45, 133852, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 4, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (46, 113448, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 79, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (47, 67449, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 86, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (48, 52252, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 25, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (49, 43956, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 36, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.package_reservations VALUES (50, 73354, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 97, '2018-12-28 19:18:40', '2018-12-28 19:18:40');


--
-- Data for Name: packages; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.packages VALUES (1, 1, 'Doloribus in non.', 974596, 5, 9, 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (2, 5, 'Et quae ad eum.', 1610170, 5, 2, 9, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (3, 4, 'Aliquam error non.', 1528728, 6, 1, 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (4, 2, 'Rerum omnis velit.', 1014841, 4, 6, 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (5, 4, 'Reprehenderit.', 351037, 6, 10, 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (6, 1, 'Nemo molestiae.', 977495, 5, 1, 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (7, 5, 'Repudiandae.', 274844, 4, 5, 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (8, 5, 'Libero perferendis.', 516172, 6, 5, 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (9, 6, 'Dolores similique.', 1752818, 4, 6, 9, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (10, 5, 'Et commodi.', 343771, 6, 5, 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.packages VALUES (11, 6, 'Sint suscipit qui.', 1545070, 3, 7, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (12, 4, 'Molestiae unde esse.', 1952547, 3, 10, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (13, 2, 'Vitae nam corrupti.', 270740, 3, 6, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (14, 5, 'Officia rem a.', 231458, 2, 9, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (15, 6, 'Cum ut beatae.', 1072712, 2, 10, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (16, 4, 'Nostrum qui rem.', 889662, 6, 7, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (17, 2, 'Quos nobis.', 1001176, 2, 7, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (18, 4, 'Est dignissimos.', 224329, 4, 1, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (19, 1, 'Sit nihil id quo.', 828058, 3, 1, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (20, 2, 'Sunt aspernatur vel.', 1333094, 6, 6, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (21, 1, 'Iste cum quia omnis.', 1426733, 5, 8, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (22, 4, 'Doloribus ea.', 1105133, 3, 8, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (23, 6, 'Impedit voluptatem.', 1311730, 2, 9, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (24, 6, 'Doloremque nihil.', 286551, 6, 8, 2, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (25, 5, 'Inventore modi.', 1345905, 2, 10, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (26, 1, 'Voluptatem et ipsam.', 980169, 3, 7, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (27, 4, 'Ea voluptates.', 1497380, 5, 7, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (28, 1, 'Maxime sit.', 1114578, 3, 5, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (29, 1, 'Officia aut.', 778028, 6, 4, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (30, 4, 'Dicta accusamus.', 140076, 2, 7, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (31, 1, 'In quae quibusdam.', 109125, 2, 5, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (32, 2, 'Quas ad dolor.', 274617, 4, 4, 2, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (33, 3, 'Laborum tempore.', 995141, 4, 2, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (34, 4, 'Consequatur aliquid.', 569901, 3, 7, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (35, 6, 'Ratione possimus ea.', 1274354, 4, 1, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (36, 3, 'Omnis dolor beatae.', 1302246, 2, 7, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (37, 1, 'Et non sit in.', 335814, 4, 10, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (38, 4, 'Nihil voluptate ut.', 1939039, 3, 7, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (39, 6, 'Soluta quia.', 1306978, 3, 8, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (40, 4, 'Odio harum eos.', 1087385, 4, 10, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (41, 2, 'Error consequatur.', 921895, 4, 5, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (42, 2, 'Ab est beatae.', 1539322, 2, 5, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (43, 1, 'Dignissimos est.', 1585582, 5, 5, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (44, 6, 'Fugit error velit.', 208754, 4, 5, 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (45, 3, 'Fugiat aut id in.', 1140167, 6, 8, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (46, 5, 'Quia qui corrupti.', 691254, 2, 9, 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (47, 5, 'Voluptas dicta.', 777904, 3, 9, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (48, 6, 'Porro laborum ea.', 1203621, 3, 4, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (49, 6, 'Molestias expedita.', 1450258, 5, 5, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (50, 1, 'Quia nam culpa.', 1191326, 3, 2, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (51, 2, 'Voluptas quisquam.', 1091291, 4, 7, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (52, 5, 'Consectetur.', 558693, 2, 3, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (53, 4, 'Quibusdam eveniet.', 118132, 6, 8, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (54, 6, 'Cumque quasi.', 1306477, 4, 10, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (55, 3, 'Fugiat eum qui.', 1654541, 6, 7, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (56, 3, 'Ad ea enim et.', 1927110, 6, 8, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (57, 6, 'Aut ratione autem.', 753852, 5, 9, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (58, 4, 'Voluptatem quasi.', 1569746, 2, 6, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (59, 4, 'Et sint cum eaque.', 1702113, 2, 3, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (60, 1, 'Eaque sunt.', 1137843, 5, 2, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (61, 4, 'Dolores perferendis.', 905557, 2, 4, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (62, 5, 'Sit dolore quam.', 1839279, 5, 6, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (63, 4, 'Aut consequatur sit.', 1741992, 2, 4, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (64, 3, 'Qui quia doloribus.', 1872237, 3, 1, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (65, 2, 'Amet unde illum.', 728505, 5, 10, 2, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (66, 5, 'Quisquam sequi.', 155703, 3, 8, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (67, 2, 'Doloribus dolore.', 893090, 4, 9, 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (68, 3, 'Qui sequi ut.', 965613, 4, 2, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (69, 2, 'Vel amet.', 1625151, 5, 10, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (70, 1, 'Ea aliquam dolorem.', 305014, 6, 9, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (71, 6, 'Commodi doloremque.', 359927, 5, 6, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (72, 6, 'Error voluptas aut.', 1869927, 6, 1, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (73, 6, 'Dolores consequatur.', 232935, 6, 10, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (74, 1, 'Sit exercitationem.', 820808, 4, 1, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (75, 3, 'Illum quos nulla.', 1603501, 4, 7, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (76, 2, 'Nam nostrum aperiam.', 1663664, 5, 7, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (77, 2, 'Commodi asperiores.', 1077043, 4, 1, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (78, 5, 'Magni quia fugiat.', 1395092, 4, 7, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (79, 1, 'Dolorem voluptas.', 1225286, 5, 10, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (80, 6, 'Et libero debitis.', 618961, 6, 8, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (81, 4, 'Repellat temporibus.', 878252, 3, 8, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (82, 3, 'Voluptatem nulla.', 1583565, 2, 10, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (83, 5, 'Et recusandae rerum.', 1438059, 3, 9, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (84, 4, 'Dicta ducimus ut.', 281467, 6, 10, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (85, 3, 'Ipsa delectus omnis.', 383101, 3, 6, 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (86, 6, 'Sed odio saepe.', 1601791, 6, 10, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (87, 6, 'Omnis.', 1685722, 5, 3, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (88, 1, 'Ea animi ad unde.', 1236134, 4, 2, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (89, 3, 'Enim minima.', 1082249, 2, 6, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (90, 2, 'Omnis amet velit.', 1038658, 3, 6, 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (91, 1, 'Facere aperiam.', 195872, 4, 1, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (92, 1, 'Cumque repellendus.', 884243, 4, 2, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (93, 6, 'Placeat error.', 166947, 6, 5, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (94, 6, 'Est corrupti.', 1151872, 2, 8, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (95, 1, 'Delectus at.', 1488056, 2, 10, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (96, 1, 'Magni neque.', 666933, 5, 10, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (97, 3, 'Et qui quam eaque.', 316482, 4, 9, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (98, 4, 'Consequatur omnis.', 1671193, 4, 7, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (99, 1, 'Maxime ipsum.', 550832, 3, 8, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.packages VALUES (100, 6, 'Dolores officiis.', 364540, 6, 8, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');


--
-- Data for Name: passengers; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.passengers VALUES (1, '15465093', 'Bella Grimes', 10, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.passengers VALUES (2, '16844613', 'Mrs. Alva Farrell', 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.passengers VALUES (3, '16057491', 'Dr. Godfrey Stokes IV', 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.passengers VALUES (4, '18937603', 'Liana Osinski', 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.passengers VALUES (5, '19560093', 'Ms. Ines Ullrich DVM', 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.passengers VALUES (6, '17482445', 'Alize Beer IV', 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.passengers VALUES (7, '17854678', 'Prof. Neil DuBuque', 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.passengers VALUES (8, '18983482', 'Mr. Mustafa Yundt IV', 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.passengers VALUES (9, '15810727', 'Dock Cole', 10, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.passengers VALUES (10, '19588833', 'Ceasar Jacobi', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: homestead
--



--
-- Data for Name: payments; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.payments VALUES (1, NULL, NULL, NULL, 0, 1, '2018-12-28 19:18:39', NULL);
INSERT INTO public.payments VALUES (2, NULL, NULL, NULL, 0, 2, '2018-12-28 19:18:39', NULL);
INSERT INTO public.payments VALUES (3, NULL, NULL, NULL, 0, 3, '2018-12-28 19:18:39', NULL);
INSERT INTO public.payments VALUES (4, NULL, NULL, NULL, 0, 4, '2018-12-28 19:18:39', NULL);
INSERT INTO public.payments VALUES (5, NULL, NULL, NULL, 0, 5, '2018-12-28 19:18:39', NULL);


--
-- Data for Name: purchase_orders; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.purchase_orders VALUES (1, 17669, '2018-12-28 00:00:00', 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.purchase_orders VALUES (2, 15481, '2018-12-28 00:00:00', 11, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.purchase_orders VALUES (3, 16824, '2018-12-28 00:00:00', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.purchase_orders VALUES (4, 16415, '2018-12-28 00:00:00', 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.purchase_orders VALUES (5, 19292, '2018-12-28 00:00:00', 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.roles VALUES (1, 'Gerente', 'Jefe del aeropuerto', NULL, NULL);
INSERT INTO public.roles VALUES (2, 'Administrador', 'Jefe/s encargado/s del personal del aeropuerto', NULL, NULL);
INSERT INTO public.roles VALUES (3, 'Trabajador', 'Trabajador/es del aeropuerto', NULL, NULL);
INSERT INTO public.roles VALUES (4, 'Cliente', 'Cliente del aeropuerto', NULL, NULL);


--
-- Data for Name: room_reservations; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.room_reservations VALUES (1, 34510, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 1, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (2, 127378, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 81, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (3, 62097, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 35, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (4, 74551, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 17, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (5, 38562, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 29, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (6, 78848, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 88, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (7, 30595, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 65, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (8, 56495, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 6, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (9, 122146, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 42, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (10, 134619, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 34, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (11, 82176, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 80, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (12, 94316, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 7, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (13, 129938, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 71, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (14, 103772, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 49, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (15, 62846, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 62, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (16, 139206, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 3, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (17, 53166, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 30, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (18, 121376, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 12, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (19, 66639, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 5, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (20, 66844, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 84, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (21, 145341, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 86, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (22, 95661, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 73, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (23, 121759, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 2, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (24, 119262, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 76, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (25, 96231, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 47, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (26, 147742, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 88, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (27, 81543, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 34, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (28, 92081, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 35, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (29, 41035, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 74, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (30, 99497, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 9, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (31, 73880, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 96, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (32, 46722, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 35, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (33, 81430, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 11, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (34, 82292, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 71, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (35, 136806, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 54, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (36, 109219, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 71, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (37, 110575, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 19, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (38, 139557, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 51, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (39, 139148, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 96, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (40, 59500, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 79, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (41, 64342, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 72, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (42, 50936, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 90, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (43, 76216, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 77, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (44, 64173, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 13, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (45, 87279, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 2, 45, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (46, 75485, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 1, 29, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (47, 143927, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 3, 94, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (48, 40572, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 56, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (49, 88435, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 4, 90, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.room_reservations VALUES (50, 45000, '2018-12-28 19:18:40', '2018-12-28 19:18:40', 5, 52, '2018-12-28 19:18:40', '2018-12-28 19:18:40');


--
-- Data for Name: rooms; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.rooms VALUES (1, 28, 4, 16293, 'Vacaciones', 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (2, 6, 1, 16778, 'Vacaciones', 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (3, 90, 2, 17313, 'Vacaciones', 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (4, 2, 3, 26107, 'Premium', 10, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (5, 76, 3, 25370, 'Premium', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (6, 77, 4, 6957, 'Economico', 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (7, 87, 2, 6018, 'Economico', 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (8, 36, 3, 8170, 'Economico', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (9, 98, 2, 17166, 'Vacaciones', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (10, 97, 2, 27198, 'Premium', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (11, 2, 4, 15288, 'Vacaciones', 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (12, 14, 1, 16971, 'Vacaciones', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (13, 80, 3, 17840, 'Vacaciones', 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (14, 2, 4, 16793, 'Vacaciones', 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (15, 24, 1, 26974, 'Premium', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (16, 53, 2, 17711, 'Vacaciones', 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (17, 44, 2, 6012, 'Economico', 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (18, 23, 2, 5837, 'Economico', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (19, 21, 2, 5651, 'Economico', 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (20, 7, 4, 7747, 'Economico', 10, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (21, 59, 2, 17156, 'Vacaciones', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (22, 89, 3, 7891, 'Economico', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (23, 46, 4, 8105, 'Economico', 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (24, 97, 4, 9533, 'Economico', 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (25, 67, 2, 9429, 'Economico', 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (26, 79, 3, 16887, 'Vacaciones', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (27, 74, 1, 28502, 'Premium', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (28, 96, 3, 27315, 'Premium', 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (29, 62, 3, 19755, 'Vacaciones', 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (30, 76, 4, 15701, 'Vacaciones', 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (31, 35, 3, 7295, 'Economico', 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (32, 41, 3, 6913, 'Economico', 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (33, 99, 1, 18578, 'Vacaciones', 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (34, 12, 4, 8469, 'Economico', 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (35, 19, 2, 19514, 'Vacaciones', 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (36, 12, 1, 19625, 'Vacaciones', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (37, 1, 3, 19399, 'Vacaciones', 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (38, 57, 2, 6741, 'Economico', 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (39, 49, 3, 18416, 'Vacaciones', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (40, 72, 1, 26961, 'Premium', 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (41, 10, 2, 8133, 'Economico', 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (42, 82, 3, 25205, 'Premium', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (43, 50, 2, 26285, 'Premium', 10, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (44, 51, 2, 25052, 'Premium', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (45, 83, 2, 17518, 'Vacaciones', 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (46, 75, 2, 6895, 'Economico', 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (47, 64, 2, 19280, 'Vacaciones', 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (48, 95, 2, 16777, 'Vacaciones', 10, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (49, 53, 4, 6216, 'Economico', 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.rooms VALUES (50, 17, 1, 18603, 'Vacaciones', 4, '2018-12-28 19:18:38', '2018-12-28 19:18:38');


--
-- Data for Name: seats; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.seats VALUES (1, 96, 'Autem corporis.', 25, 8, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (2, 42, 'Sit debitis.', 27, 9, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (3, 75, 'Facilis eos.', 6, 1, 9, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (4, 20, 'Et cupiditate.', 40, 5, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (5, 99, 'Velit ut nobis.', 37, 2, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (6, 89, 'Porro placeat.', 20, 3, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (7, 48, 'Magni rem.', 40, 1, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (8, 1, 'Dignissimos.', 42, 8, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (9, 22, 'Sed itaque.', 19, 9, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (10, 2, 'Quis tempore.', 6, 4, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (11, 18, 'Sapiente natus.', 22, 2, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (12, 16, 'Quas id dicta.', 41, 5, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (13, 91, 'Consequatur.', 28, 3, 1, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (14, 10, 'Sit.', 19, 8, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (15, 99, 'Nam nihil aut.', 14, 4, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (16, 83, 'Quae similique.', 23, 8, 2, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (17, 48, 'Cum quod ut.', 31, 4, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (18, 83, 'Ut saepe aut.', 7, 4, 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (19, 18, 'Harum alias.', 10, 4, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (20, 78, 'Tempora aut.', 19, 6, 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (21, 36, 'Mollitia ut.', 47, 6, 2, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (22, 69, 'Quia at.', 31, 9, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (23, 6, 'Omnis.', 41, 10, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (24, 92, 'Odio.', 46, 3, 2, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (25, 62, 'Et consequatur.', 15, 8, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (26, 6, 'Nostrum id.', 27, 9, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (27, 14, 'Sed molestias.', 41, 8, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (28, 45, 'Deleniti.', 31, 10, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (29, 41, 'Repellat sit.', 4, 9, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (30, 71, 'Quam animi.', 4, 2, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (31, 30, 'Est sed aut id.', 28, 1, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (32, 86, 'Labore.', 35, 4, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (33, 96, 'Est corrupti.', 48, 1, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (34, 3, 'Maxime nisi et.', 4, 9, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (35, 77, 'Consequatur.', 38, 7, 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (36, 56, 'Et voluptatem.', 3, 5, 2, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (37, 15, 'Accusamus.', 10, 9, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (38, 57, 'Necessitatibus.', 37, 3, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (39, 78, 'Voluptas eaque.', 42, 1, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (40, 93, 'Impedit.', 33, 1, 5, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (41, 11, 'Qui pariatur.', 10, 4, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (42, 71, 'Nihil qui.', 25, 2, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (43, 52, 'Voluptas.', 7, 7, 10, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (44, 8, 'Asperiores.', 40, 1, 4, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (45, 45, 'Sapiente.', 46, 7, 7, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (46, 5, 'Aut quas.', 8, 9, 3, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (47, 70, 'Voluptatem.', 21, 5, 8, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (48, 98, 'Eveniet.', 30, 6, 2, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (49, 73, 'Magni et.', 33, 2, 2, '2018-12-28 19:18:39', '2018-12-28 19:18:39');
INSERT INTO public.seats VALUES (50, 21, 'Omnis dolor.', 35, 5, 6, '2018-12-28 19:18:39', '2018-12-28 19:18:39');


--
-- Data for Name: states; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.states VALUES (1, 'Pendiente', 1, '2018-12-28 19:18:39', NULL);
INSERT INTO public.states VALUES (2, 'Pendiente', 2, '2018-12-28 19:18:39', NULL);
INSERT INTO public.states VALUES (3, 'Pendiente', 3, '2018-12-28 19:18:39', NULL);
INSERT INTO public.states VALUES (4, 'Pendiente', 4, '2018-12-28 19:18:39', NULL);
INSERT INTO public.states VALUES (5, 'Pendiente', 5, '2018-12-28 19:18:39', NULL);
INSERT INTO public.states VALUES (6, 'Pendiente', 6, '2018-12-28 19:18:39', NULL);
INSERT INTO public.states VALUES (7, 'Pendiente', 7, '2018-12-28 19:18:39', NULL);
INSERT INTO public.states VALUES (8, 'Pendiente', 8, '2018-12-28 19:18:39', NULL);
INSERT INTO public.states VALUES (9, 'Pendiente', 9, '2018-12-28 19:18:39', NULL);
INSERT INTO public.states VALUES (10, 'Pendiente', 10, '2018-12-28 19:18:39', NULL);


--
-- Data for Name: ticket_reservations; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.ticket_reservations VALUES (1, 45564, 3, 32, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (2, 61239, 5, 63, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (3, 64625, 2, 72, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (4, 116325, 2, 8, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (5, 130864, 1, 31, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (6, 93035, 2, 65, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (7, 130985, 2, 59, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (8, 97613, 5, 54, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (9, 34638, 4, 93, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (10, 104511, 5, 69, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (11, 133844, 5, 70, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (12, 138576, 1, 33, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (13, 97241, 2, 24, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (14, 44170, 5, 45, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (15, 78097, 5, 28, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (16, 122638, 4, 61, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (17, 127663, 4, 18, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (18, 122222, 1, 83, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (19, 119360, 5, 24, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (20, 60017, 3, 64, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (21, 108997, 2, 44, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (22, 81782, 3, 57, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (23, 90311, 5, 41, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (24, 120939, 3, 52, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (25, 86555, 3, 93, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (26, 81668, 2, 8, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (27, 110619, 3, 40, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (28, 70876, 3, 88, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (29, 113270, 4, 38, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (30, 92507, 2, 83, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (31, 96109, 3, 77, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (32, 82503, 4, 35, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (33, 88990, 2, 29, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (34, 142252, 1, 77, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (35, 39528, 2, 59, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (36, 77621, 2, 27, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (37, 104077, 5, 81, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (38, 89485, 3, 43, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (39, 123867, 2, 49, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (40, 69487, 4, 85, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (41, 66941, 2, 5, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (42, 146980, 3, 73, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (43, 91678, 3, 2, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (44, 56289, 3, 68, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (45, 138175, 2, 15, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (46, 69825, 5, 79, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (47, 107945, 5, 98, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (48, 106322, 5, 44, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (49, 142140, 3, 7, '2018-12-28 19:18:40', '2018-12-28 19:18:40');
INSERT INTO public.ticket_reservations VALUES (50, 136991, 3, 68, '2018-12-28 19:18:40', '2018-12-28 19:18:40');


--
-- Data for Name: tickets; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.tickets VALUES (1, 21388, 105, 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.tickets VALUES (2, 28833, 117, 3, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.tickets VALUES (3, 27688, 110, 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.tickets VALUES (4, 20994, 150, 1, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.tickets VALUES (5, 25251, 131, 6, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.tickets VALUES (6, 24560, 121, 8, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.tickets VALUES (7, 22346, 129, 7, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.tickets VALUES (8, 21713, 129, 2, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.tickets VALUES (9, 27014, 111, 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');
INSERT INTO public.tickets VALUES (10, 23865, 106, 5, '2018-12-28 19:18:38', '2018-12-28 19:18:38');


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: homestead
--

INSERT INTO public.users VALUES (1, 'Bruno Diaz', 'bruno.diaz@example.com', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, '6.123.489-7', 'XhqjKNBSK3', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 1);
INSERT INTO public.users VALUES (2, 'Lorenzo Delgado', 'nico.robel@example.com', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 564, '15164083', 'QQcjwEUkv1', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 2);
INSERT INTO public.users VALUES (3, 'Carlos Guzman', 'fay.tess@example.com', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 548, '18003738', 'LPd5TihHxa', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 3);
INSERT INTO public.users VALUES (4, 'Nicolas Ayala', 'glover.joyce@example.org', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 565, '19387986', 'DmtmQrNC5n', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 3);
INSERT INTO public.users VALUES (5, 'Julio Gonzalez', 'nash.harvey@example.net', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 507, '21706011', 'BEoviLbijL', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 2);
INSERT INTO public.users VALUES (6, 'Lorenzo Delgado', 'virgil.morar@example.org', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 562, '16215483', '2qORz9ZpcH', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 2);
INSERT INTO public.users VALUES (7, 'Julio Gonzalez', 'brook.rodriguez@example.net', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 558, '15077467', 'llAWsKLUjH', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 3);
INSERT INTO public.users VALUES (8, 'Lorenzo Delgado', 'ruthe.hamill@example.org', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 531, '20113069', '99BUubj49d', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 3);
INSERT INTO public.users VALUES (9, 'Nicolas Ayala', 'colt26@example.com', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 521, '17084486', 'L0NwL1OZVQ', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 3);
INSERT INTO public.users VALUES (10, 'Nicolas Ayala', 'kelvin09@example.net', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 539, '21920979', 'gn1T8bZSRH', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 2);
INSERT INTO public.users VALUES (11, 'Julio Gonzalez', 'dickinson.sienna@example.net', '2018-12-28 19:18:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 505, '20440824', 'AkQaof6PY5', '2018-12-28 19:18:38', '2018-12-28 19:18:38', 3);


--
-- Name: airplanes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.airplanes_id_seq', 10, true);


--
-- Name: car_reservations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.car_reservations_id_seq', 50, true);


--
-- Name: cars_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.cars_id_seq', 10, true);


--
-- Name: cities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.cities_id_seq', 10, true);


--
-- Name: countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.countries_id_seq', 5, true);


--
-- Name: flights_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.flights_id_seq', 10, true);


--
-- Name: hotels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.hotels_id_seq', 10, true);


--
-- Name: insurance_reservations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.insurance_reservations_id_seq', 50, true);


--
-- Name: insurances_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.insurances_id_seq', 5, true);


--
-- Name: luggages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.luggages_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.migrations_id_seq', 27, true);


--
-- Name: package_reservations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.package_reservations_id_seq', 50, true);


--
-- Name: packages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.packages_id_seq', 100, true);


--
-- Name: passengers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.passengers_id_seq', 10, true);


--
-- Name: payments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.payments_id_seq', 1, false);


--
-- Name: purchase_orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.purchase_orders_id_seq', 5, true);


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.roles_id_seq', 4, true);


--
-- Name: room_reservations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.room_reservations_id_seq', 50, true);


--
-- Name: rooms_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.rooms_id_seq', 50, true);


--
-- Name: seats_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.seats_id_seq', 50, true);


--
-- Name: states_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.states_id_seq', 1, false);


--
-- Name: ticket_reservations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.ticket_reservations_id_seq', 50, true);


--
-- Name: tickets_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.tickets_id_seq', 10, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.users_id_seq', 11, true);


--
-- Name: airplanes airplanes_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.airplanes
    ADD CONSTRAINT airplanes_pkey PRIMARY KEY (id);


--
-- Name: car_reservations car_reservations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.car_reservations
    ADD CONSTRAINT car_reservations_pkey PRIMARY KEY (id);


--
-- Name: cars cars_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT cars_pkey PRIMARY KEY (id);


--
-- Name: cities cities_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cities
    ADD CONSTRAINT cities_pkey PRIMARY KEY (id);


--
-- Name: countries countries_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.countries
    ADD CONSTRAINT countries_pkey PRIMARY KEY (id);


--
-- Name: flights flights_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flights
    ADD CONSTRAINT flights_pkey PRIMARY KEY (id);


--
-- Name: hotels hotels_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hotels
    ADD CONSTRAINT hotels_pkey PRIMARY KEY (id);


--
-- Name: insurance_reservations insurance_reservations_id_unique; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.insurance_reservations
    ADD CONSTRAINT insurance_reservations_id_unique UNIQUE (id);


--
-- Name: insurance_reservations insurance_reservations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.insurance_reservations
    ADD CONSTRAINT insurance_reservations_pkey PRIMARY KEY (id);


--
-- Name: insurances insurances_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.insurances
    ADD CONSTRAINT insurances_pkey PRIMARY KEY (id);


--
-- Name: luggages luggages_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.luggages
    ADD CONSTRAINT luggages_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: package_reservations package_reservations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.package_reservations
    ADD CONSTRAINT package_reservations_pkey PRIMARY KEY (id);


--
-- Name: packages packages_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.packages
    ADD CONSTRAINT packages_pkey PRIMARY KEY (id);


--
-- Name: passengers passengers_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.passengers
    ADD CONSTRAINT passengers_pkey PRIMARY KEY (id);


--
-- Name: passengers passengers_rut_unique; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.passengers
    ADD CONSTRAINT passengers_rut_unique UNIQUE (rut);


--
-- Name: payments payments_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_pkey PRIMARY KEY (id);


--
-- Name: purchase_orders purchase_orders_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.purchase_orders
    ADD CONSTRAINT purchase_orders_pkey PRIMARY KEY (id);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: room_reservations room_reservations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.room_reservations
    ADD CONSTRAINT room_reservations_pkey PRIMARY KEY (id);


--
-- Name: rooms rooms_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.rooms
    ADD CONSTRAINT rooms_pkey PRIMARY KEY (id);


--
-- Name: seats seats_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.seats
    ADD CONSTRAINT seats_pkey PRIMARY KEY (id);


--
-- Name: states states_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.states
    ADD CONSTRAINT states_pkey PRIMARY KEY (id);


--
-- Name: ticket_reservations ticket_reservations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.ticket_reservations
    ADD CONSTRAINT ticket_reservations_pkey PRIMARY KEY (id);


--
-- Name: tickets tickets_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tickets_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: homestead
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: flights tg_flight_state; Type: TRIGGER; Schema: public; Owner: homestead
--

CREATE TRIGGER tg_flight_state AFTER INSERT ON public.flights FOR EACH ROW EXECUTE PROCEDURE public.setstatetoflight();


--
-- Name: passengers tg_passenger_luggage; Type: TRIGGER; Schema: public; Owner: homestead
--

CREATE TRIGGER tg_passenger_luggage AFTER INSERT ON public.passengers FOR EACH ROW EXECUTE PROCEDURE public.setluggagetopassenger();


--
-- Name: purchase_orders tg_purchase_order_payment; Type: TRIGGER; Schema: public; Owner: homestead
--

CREATE TRIGGER tg_purchase_order_payment AFTER INSERT ON public.purchase_orders FOR EACH ROW EXECUTE PROCEDURE public.setpaymenttopurchase_order();


--
-- Name: airplanes airplanes_flight_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.airplanes
    ADD CONSTRAINT airplanes_flight_id_foreign FOREIGN KEY (flight_id) REFERENCES public.flights(id);


--
-- Name: car_reservations car_reservations_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.car_reservations
    ADD CONSTRAINT car_reservations_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: car_reservations car_reservations_purchase_order_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.car_reservations
    ADD CONSTRAINT car_reservations_purchase_order_id_foreign FOREIGN KEY (purchase_order_id) REFERENCES public.purchase_orders(id);


--
-- Name: cars cars_city_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT cars_city_id_foreign FOREIGN KEY (city_id) REFERENCES public.cities(id);


--
-- Name: cities cities_country_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.cities
    ADD CONSTRAINT cities_country_id_foreign FOREIGN KEY (country_id) REFERENCES public.countries(id);


--
-- Name: flights flights_destination_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flights
    ADD CONSTRAINT flights_destination_id_foreign FOREIGN KEY (destination_id) REFERENCES public.cities(id);


--
-- Name: flights flights_origin_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.flights
    ADD CONSTRAINT flights_origin_id_foreign FOREIGN KEY (origin_id) REFERENCES public.cities(id);


--
-- Name: insurance_reservations insurance_reservations_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.insurance_reservations
    ADD CONSTRAINT insurance_reservations_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: insurance_reservations insurance_reservations_purchase_order_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.insurance_reservations
    ADD CONSTRAINT insurance_reservations_purchase_order_id_foreign FOREIGN KEY (purchase_order_id) REFERENCES public.purchase_orders(id);


--
-- Name: luggages luggages_passenger_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.luggages
    ADD CONSTRAINT luggages_passenger_id_foreign FOREIGN KEY (passenger_id) REFERENCES public.passengers(id);


--
-- Name: package_reservations package_reservations_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.package_reservations
    ADD CONSTRAINT package_reservations_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: package_reservations package_reservations_purchase_order_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.package_reservations
    ADD CONSTRAINT package_reservations_purchase_order_id_foreign FOREIGN KEY (purchase_order_id) REFERENCES public.purchase_orders(id);


--
-- Name: packages packages_destination_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.packages
    ADD CONSTRAINT packages_destination_id_foreign FOREIGN KEY (destination_id) REFERENCES public.cities(id);


--
-- Name: packages packages_origin_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.packages
    ADD CONSTRAINT packages_origin_id_foreign FOREIGN KEY (origin_id) REFERENCES public.cities(id);


--
-- Name: passengers passengers_ticket_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.passengers
    ADD CONSTRAINT passengers_ticket_id_foreign FOREIGN KEY (ticket_id) REFERENCES public.tickets(id);


--
-- Name: payments payments_purchase_order_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_purchase_order_id_foreign FOREIGN KEY (purchase_order_id) REFERENCES public.purchase_orders(id);


--
-- Name: purchase_orders purchase_orders_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.purchase_orders
    ADD CONSTRAINT purchase_orders_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: room_reservations room_reservations_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.room_reservations
    ADD CONSTRAINT room_reservations_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: room_reservations room_reservations_purchase_order_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.room_reservations
    ADD CONSTRAINT room_reservations_purchase_order_id_foreign FOREIGN KEY (purchase_order_id) REFERENCES public.purchase_orders(id);


--
-- Name: rooms rooms_hotel_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.rooms
    ADD CONSTRAINT rooms_hotel_id_foreign FOREIGN KEY (hotel_id) REFERENCES public.hotels(id);


--
-- Name: seats seats_airplane_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.seats
    ADD CONSTRAINT seats_airplane_id_foreign FOREIGN KEY (airplane_id) REFERENCES public.airplanes(id);


--
-- Name: seats seats_ticket_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.seats
    ADD CONSTRAINT seats_ticket_id_foreign FOREIGN KEY (ticket_id) REFERENCES public.tickets(id);


--
-- Name: states states_flight_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.states
    ADD CONSTRAINT states_flight_id_foreign FOREIGN KEY (flight_id) REFERENCES public.flights(id);


--
-- Name: ticket_reservations ticket_reservations_package_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.ticket_reservations
    ADD CONSTRAINT ticket_reservations_package_id_foreign FOREIGN KEY (package_id) REFERENCES public.packages(id);


--
-- Name: ticket_reservations ticket_reservations_purchase_order_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.ticket_reservations
    ADD CONSTRAINT ticket_reservations_purchase_order_id_foreign FOREIGN KEY (purchase_order_id) REFERENCES public.purchase_orders(id);


--
-- Name: tickets tickets_flight_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tickets_flight_id_foreign FOREIGN KEY (flight_id) REFERENCES public.flights(id);


--
-- Name: users users_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id);


--
-- PostgreSQL database dump complete
--

