/*
 Navicat Premium Data Transfer

 Source Server         : COMBA_DB
 Source Server Type    : PostgreSQL
 Source Server Version : 110003
 Source Host           : localhost:5432
 Source Catalog        : comba_db
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 110003
 File Encoding         : 65001

 Date: 11/05/2019 20:43:09
*/


-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS "public"."usuarios";
CREATE TABLE "public"."usuarios" (
  "user_id" int4 NOT NULL DEFAULT nextval('usuarios_user_id_seq'::regclass),
  "user_nombre" text COLLATE "pg_catalog"."default",
  "user_apellido" text COLLATE "pg_catalog"."default",
  "user_email" text COLLATE "pg_catalog"."default",
  "user_cedula" int8,
  "user_direccion" text COLLATE "pg_catalog"."default",
  "user_telefono" int8,
  "user_cvlac_num" int8,
  "user_cvlac_dir" text COLLATE "pg_catalog"."default",
  "user_orcid" int8,
  "user_niv_aca" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Primary Key structure for table usuarios
-- ----------------------------
ALTER TABLE "public"."usuarios" ADD CONSTRAINT "usuarios_pkey" PRIMARY KEY ("user_id");
