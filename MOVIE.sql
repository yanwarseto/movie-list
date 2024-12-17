/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : PostgreSQL
 Source Server Version : 160003 (160003)
 Source Host           : localhost:5432
 Source Catalog        : postgres
 Source Schema         : MOVIE

 Target Server Type    : PostgreSQL
 Target Server Version : 160003 (160003)
 File Encoding         : 65001

 Date: 17/12/2024 21:35:16
*/


-- ----------------------------
-- Table structure for DETAIL_MOV
-- ----------------------------
DROP TABLE IF EXISTS "MOVIE"."DETAIL_MOV";
CREATE TABLE "MOVIE"."DETAIL_MOV" (
  "ID" int8 NOT NULL,
  "OVERVIEW" varchar(1000) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of DETAIL_MOV
-- ----------------------------
INSERT INTO "MOVIE"."DETAIL_MOV" VALUES (900667, '                                    lorem ipsum dolor sir amet                     kldjnsalkncjklasncuiabsc               ');

-- ----------------------------
-- Primary Key structure for table DETAIL_MOV
-- ----------------------------
ALTER TABLE "MOVIE"."DETAIL_MOV" ADD CONSTRAINT "DETAIL_MOV_pkey" PRIMARY KEY ("ID");
