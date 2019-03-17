# Distributed Databases
<p align="justify">
 
> This repository contains the implementation of a distributed system step by step applied to a website of company. All topics viewed during the distributed databases course 2017-2 ESCOM IPN are covered.

</p>

### Content
 - Distributed Databases (An Overview)
 - Mueblerias Quetzal (Sales and Inventory System Management)
 - Multidatabase System (Managing a Heterogeneous System)
 - Fragmentation (Leading to a Distributed Database)
 
### Distributed Databases (An Overview)

#### What is a Distributed Database?
<p align="justify">
A distributed database is a database in which not all storage devices are attached to a common processor. It may be stored in multiple computers, located in the same physical location; or may be dispersed over a network of interconnected computers. A distributed database system consists of loosely coupled sites that share no physical components.
</p>

<p align="center">
 <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/replication.gif" alt="Replication"/>
</p>

<p align="justify">
Two processes ensure that the distributed databases remain up-to-date and current: replication and duplication.
 
 - **Replication**: involves using specialized software that looks for changes in the distributive database. Once the changes have been identified, the replication process makes all the databases look the same.
    
 - **Duplication**: on the other hand, has less complexity. It basically identifies one database as a master and then duplicates that database.
 
</p>

### Mueblerias Quetzal
<p align="justify">
This system has been developed for a company named **Mueblerías Quetzal S.A. de C.V.** with the purpose of create an application which supports inventory control, retail, user registration. Providing to the company a fast and efficient tool and help it to get into e-commerce.
</p>

#### Development Tools and Features
The development of this project was made with the following features grouped in the Database Server and Web Server:

**Database Server Features**
- Apache/2.4.6 (CentOS) OpenSSL/1.0.1 e-flips
- Database client version: libmysql - mysqllnd 5.0.12-dev
- PHP extension: MySQL improved extension (mysqli)
- PHP extension: phpMyAdmin v4.6.6
- PHP version: 7.0.8

**Web Server Features**
- Apache/2.4.6 (CentOS) OpenSSL/1.0.1 e-flips item 20
- PHP extension: MySQL improved extension (mysqli)
- PHP version: 7.0.8
- JavaScript version: ECMAScript 6 (JS 2015)
- HTML version: 5
- CSS version: 3

#### Database Model
<p align="center">
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto1_database.png" alt="DatabaseP1"/>
</p>

#### Screenshoots
<p align="center">
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto1_1.png" alt="SSP1_1"/>
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto1_2.png" alt="SSP1_2"/>
</p>

### Multidatabase System
<p align="justify">
A multidatabase system solution has been developed which allows **Teatro Aktuar** company manage the furniture rented from **Mueblerias Quetzal**, in order to improve their performance and operations related with inventory.
</p>

#### Development Tools and Features
The development of this project was made with the following features grouped in the Database Server and Web Server:

**Database Server Features (Mueblerias Quetzal)**
- Server: localhost vía UNIX socket
- Server type: MariaDB
- Server version: 10.1.20-MariaDB - MariaDB Server
- Protocol version: 10
- Server charset: utd-8 Unicode (utf-8)

**Database Server Features (Teatro Aktuar)**
- Server: ocalhost vía UNIX socket
- Server type: MariaDB
- Server version: 10.1.20-MariaDB - MariaDBServer
- Protocol version: 10
- Server charset: utd-8 Unicode (utf-8)

**Web Server Features (Teatro Aktuar)**
- Apache/2.4.6 (CentOS) OpenSSL/1.0.1 e-flips item 20
- Database client version: libmysql - mysqlnd 5.0.12-dev
- PHP extension: MySQL improved extension (mysqli), curl, mbstring
- PHP extension: phpMyAdmin v4.6.6
- PHP version: 7.0.8

#### System Architecture
<p align="center">
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto2_architecture.png" alt="ArchitectureP2"/>
</p>

#### Database Model
<p align="center">
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto2_database.png" alt="DatabaseP2"/>
</p>

#### Screenshoots
<p align="center">
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto2_1.png" alt="SSP2_1"/>
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto2_2.png" alt="SSP2_2"/>
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto2_3.png" alt="SSP2_3"/> 
</p>

### Fragmentation
<p align="justify">
In this stage the company needed to have its database fragmented, this feature of the database server allows defining groups of names or index keys within a table, each group or fragment can be stored in a separate database associated with a specific physical disk. From the perspective of an end user (or client application) fragmented tables are identical to a non-fragmented table, therefore providing "transparency" and "replication" to the distributed system.
</p>

#### Features
Fragmentation provides the following features to the system:

- Single User Response Time
- Concurrence
- Transparency to End User
- Availability
- Backup and Restoration Features
- Faster Loading Data

#### Horizontal Fragmentation Model
<p align="center">
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto3_hdatabase.png" alt="HFM"/>
</p>

#### Vertical Fragmentation Model
<p align="center">
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto3_vdatabase.png" alt="VFM"/>
</p>

#### Screenshoots
<p align="center">
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto3_1.png" alt="SSP3_1"/>
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto3_2.png" alt="SSP3_2"/>
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto3_3.png" alt="SSP3_3"/>
  <img src="https://github.com/PitCoder/DistributedDataBases/blob/master/IMG/proyecto3_4.png" alt="SSP3_4"/> 
</p>

### Team
> This is the team that made Mueblerias Quetzal and its extensions possible:

| <a href="https://github.com/DavidFCT" target="_blank">**David Flores Casanova**</a> | <a href="https://github.com/PitCoder" target="_blank">**Eric Alejandro López Ayala**</a> | <a href="https://github.com/DanielOrtegaZ" target="_blank">**Daniel Isaí Ortega Zuñiga**</a> |
|:---:| :---:| :---:|
| [![David Flores Casanova](https://avatars3.githubusercontent.com/u/37358298?s=200&v=2)](https://github.com/DavidFCT) | [![Eric Alejandro López Ayala](https://avatars3.githubusercontent.com/u/22123865?s=200&v=2)](https://github.com/PitCoder)  | [![Daniel Isaí Ortega Zuñiga](https://avatars1.githubusercontent.com/u/37394304?s=200&v=2)](https://github.com/DanielOrtegaZ) |
| <p>System Architect and Fullstack Developer</p> | <p>Fullstack Developer and Documenter</p> | <p>System Architect and Fullstack Developer</p> |

### License
[![License](https://img.shields.io/github/license/pitcoder/distributeddatabases.svg?color=orange&style=flat-square)](http://badges.mit-license.org)

- **[Apache 2.0 license](https://github.com/PitCoder/DistributedDataBases/blob/master/LICENSE)**
- Copyright 2017 © <a href="https://github.com/PitCoder" target="_blank">Eric Alejandro López Ayala</a>
<a href="https://github.com/DavidFCT" target="_blank">David Flores Casanova</a>
<a href="https://github.com/DanielOrtegaZ" target="_blank">Daniel Isaí Ortega Zuñiga</a>.
