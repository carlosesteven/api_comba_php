-- Table: public.software

-- DROP TABLE public.software;

CREATE TABLE public.software
(
    sw_id integer NOT NULL DEFAULT nextval('software_sw_id_seq'::regclass) ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    sw_cod bigint,
    sw_nom text COLLATE pg_catalog."default",
    sw_des text COLLATE pg_catalog."default",
    CONSTRAINT software_pkey PRIMARY KEY (sw_id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.software
    OWNER to postgres;