-- Table: public.libro

-- DROP TABLE public.libro;

CREATE TABLE public.libro
(
    lib_id bigint NOT NULL DEFAULT nextval('libro_lib_id_seq'::regclass) ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 9223372036854775807 CACHE 1 ),
    lib_isbn text COLLATE pg_catalog."default",
    lib_col text COLLATE pg_catalog."default",
    lib_tip text COLLATE pg_catalog."default",
    lib_ind text COLLATE pg_catalog."default",
    lib_tit text COLLATE pg_catalog."default",
    lib_tit_cap text COLLATE pg_catalog."default",
    lib_pre_mes bigint,
    lib_pre_anio bigint,
    lib_pais text COLLATE pg_catalog."default",
    lib_edi_id bigint NOT NULL,
    CONSTRAINT libro_pkey PRIMARY KEY (lib_id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.libro
    OWNER to postgres;