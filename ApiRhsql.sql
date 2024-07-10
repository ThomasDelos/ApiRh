CREATE TABLE Role(
   id_role INT,
   RoleName VARCHAR(50),
   PRIMARY KEY(id_role)
);

CREATE TABLE WorkDay(
   id_day INT,
   DayName VARCHAR(50),
   Dates DATE,
   PRIMARY KEY(id_day)
);

CREATE TABLE Users(
   Id_user INT,
   lastname VARCHAR(50),
   firstname VARCHAR(50),
   email VARCHAR(50),
   workingPlace VARCHAR(50),
   CountReminder INT,
   LastReminder DATE,
   Id_manager INT NOT NULL,
   id_role INT NOT NULL,
   PRIMARY KEY(Id_user),
   FOREIGN KEY(Id_manager) REFERENCES Users(Id_user),
   FOREIGN KEY(id_role) REFERENCES Role(id_role)
);

CREATE TABLE TimeSheet(
   id_TimeSheet INT,
   Period VARCHAR(50),
   UserStatus LOGICAL,
   Id_user INT NOT NULL,
   PRIMARY KEY(id_TimeSheet),
   FOREIGN KEY(Id_user) REFERENCES Users(Id_user)
);

CREATE TABLE TimeSheet_Status(
   Id_timeSheetStatus INT,
   ManagerStatus LOGICAL,
   StatusComment VARCHAR(50),
   Id_manager INT NOT NULL,
   id_TimeSheet INT NOT NULL,
   PRIMARY KEY(Id_timeSheetStatus),
   FOREIGN KEY(Id_manager) REFERENCES Users(Id_manager),
   FOREIGN KEY(id_TimeSheet) REFERENCES TimeSheet(id_TimeSheet)
);

CREATE TABLE Contain(
   id_TimeSheet INT,
   id_day INT,
   WorkHours INT,
   OffHours INT,
   Comment VARCHAR(50),
   PRIMARY KEY(id_TimeSheet, id_day),
   FOREIGN KEY(id_TimeSheet) REFERENCES TimeSheet(id_TimeSheet),
   FOREIGN KEY(id_day) REFERENCES WorkDay(id_day)
);
