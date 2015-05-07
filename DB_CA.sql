CREATE TABLE user
(
username varchar(50) PRIMARY KEY,
nama varchar(40) NOT NULL,
password varchar(30)
);

CREATE TABLE csr
(
id int PRIMARY KEY AUTO_INCREMENT,
username varchar(50) NOT NULL,
country varchar(50),
organization varchar(50),
name varchar(50),
unit varchar(50),
status varchar(20),

CONSTRAINT fk_csr FOREIGN KEY (username)
REFERENCES user(username)
);

id-at-countryName
countryName
C
id-at-organizationName
organizationName
O
id-at-dnQualifier
dnQualifier
id-at-commonName
commonName
CN
id-at-stateOrProvinceName
state
province
provincename
ST
id-at-localityName
localityName
L
id-emailAddress
emailAddress
id-at-serialNumber
serialNumber
id-at-postalCode
postalCode
id-at-streetAddress
streetAddress
id-at-name
name
id-at-givenName
givenName
id-at-surname
surname
id-at-initials
initials
id-at-generationQualifier
generationQualifier
id-at-organizationalUnitName
organizationalUnitName
OU
id-at-pseudonym
pseudonym
id-at-title
title
id-at-description
description
id-at-role
role
id-at-uniqueidentifier
uniqueidentifier
x500uniqueidentifier