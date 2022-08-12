IF OBJECT_ID ('dbo.SIKABUNGAH_STD_TTBJ') IS NOT NULL
	DROP TABLE dbo.SIKABUNGAH_STD_TTBJ
GO

CREATE TABLE dbo.SIKABUNGAH_STD_TTBJ
	(
	WEEK       INT NOT NULL,
	STANDAR_10 DECIMAL (6,2) NOT NULL,
	STANDAR_25 DECIMAL (6,2) NOT NULL,
	STANDAR_50 DECIMAL (6,2) NOT NULL,
	STANDAR_75 DECIMAL (6,2) NOT NULL,
	STANDAR_90 DECIMAL (6,2) NOT NULL
	)
GO

