IF OBJECT_ID ('dbo.SIKABUNGAH_PERIKSA_ANAK') IS NOT NULL
	DROP TABLE dbo.SIKABUNGAH_PERIKSA_ANAK
GO

CREATE TABLE dbo.SIKABUNGAH_PERIKSA_ANAK
	(
	ID_PERIKSA_ANAK NUMERIC (18) IDENTITY NOT NULL,
	ID_ANAK_KE      INT NOT NULL,
	NORM_IBU        CHAR (20) NULL,
	TGL_PERIKSA     DATE NULL,
	BERAT_BADAN     DECIMAL (9,2) NULL,
	TINGGI_BADAN    DECIMAL (9,2) NULL,
	CREATE_DATE     DATETIME NULL
	)
GO

