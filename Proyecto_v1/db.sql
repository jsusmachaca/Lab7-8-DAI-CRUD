ALTER TABLE EMPLEADOS ADD (
     horas_trabajo int (3), telefono int (8)
     );



CREATE TABLE BENEFICIOS(
     id_emp int(5),
     PRIMARY KEY(id), FOREIGN KEY(id_emp) REFERENCES EMPLEADOS(id_emp),

     id int NOT NULL AUTO_INCREMENT,
     monto int(4),
     canasta varchar(2)
);
