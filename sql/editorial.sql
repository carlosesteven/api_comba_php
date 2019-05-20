-- Table: public.editorial

-- DROP TABLE public.editorial;

CREATE TABLE public.editorial
(
    edi_id bigint NOT NULL,
    edi_nom text COLLATE pg_catalog."default",
    CONSTRAINT editorial_pkey PRIMARY KEY (edi_id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.editorial
    OWNER to postgres;