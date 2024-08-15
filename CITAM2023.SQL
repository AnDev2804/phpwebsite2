---------------------------------------------------------------------------
-- Estructura de la tabla 'PACIENTE'
---------------------------------------------------------------------------
DROP TABLE IF EXISTS PACIENTE;
CREATE TABLE IF NOT EXISTS PACIENTE 
(
  idRif varchar(15) NOT NULL,              --ID del Paciente
  nombPaciente varchar(255) NOT NULL,      --Nombres del Paciente
  apellidoPaciente varchar(255) NOT NULL,  --Apellidos del Paciente
  fechaNacPaciente date,				   --Fecha Nacimiento del Paciente
  dirPaciente varchar(255) NOT NULL,       --Direccion del Paciente
  emailPaciente varchar(255) NOT NULL,     --email del Cliente
  telefonoPaciente varchar(255) NOT NULL,  --Num Telefono del Cliente
  PRIMARY KEY (idRif)
);
---------------------------------------------------------------------------
-- Estructura de la tabla 'PERFIL'
---------------------------------------------------------------------------
DROP TABLE IF EXISTS PERFIL;
CREATE TABLE IF NOT EXISTS PERFIL 
(
  idRif varchar(15) NOT NULL,              	--ID del Paciente
  tipoSangre varchar(2) NOT NULL,      		--Tipo de Sangre del Paciente
  factorSangre varchar(5) NOT NULL,  		--Factor de la Sangre del Paciente
  factorAlergico varchar(255) NOT NULL,     --Factores que Producen Alregia al Paciente
  factorCongenito varchar(255) NOT NULL,    --Factores Congenitos que Padece el Paciente
  factorMotriz varchar(255) NOT NULL,  		--Limitaciones Motrices del Cliente
  PRIMARY KEY (idRif)
);
---------------------------------------------------------------------------
-- Estructura de la tabla 'CITA'
---------------------------------------------------------------------------
DROP TABLE IF EXISTS CITA;
CREATE TABLE IF NOT EXISTS CITA 
(
  idRif varchar(15) NOT NULL,           --ID del Paciente
  fechaCita date,						--Fecha para cuando quiere la Cita
  codEspecialidad int(11) NOT NULL,		--Especialidad Medica a la cual asistira
  codEspecialista varchar(15) NOT NULL, --ID del Medico que atendera al Paciente
  Observaciones varchar(255) NOT NULL,	--Observacion General de la Visita Medica
  Diagnostico varchar(255) NOT NULL,    --Diagnostico Establecido por el Especialista
  Tratamiento varchar(255) NOT NULL,  	--Tratamiento Establecido por el Especialista
  sugiereNuevaCita varchar(1) NOT NULL,	--se Sugiere Nueva Cita (Boolean)
  costoCita decimal(10,2),
  PRIMARY KEY (idRif,fechaCita,codEspecialidad)
);
---------------------------------------------------------------------------
-- Estructura de la tabla 'ESPECIALISTA'
---------------------------------------------------------------------------
DROP TABLE IF EXISTS ESPECIALISTA;
CREATE TABLE IF NOT EXISTS ESPECIALISTA 
(
  idRifEsp varchar(15) NOT NULL,               --ID del Especialista
  nombPaciente varchar(255) NOT NULL,          --Nombres del Especialista
  apellidoPaciente varchar(255) NOT NULL,      --Apellidos del Especialista
  areaEspecialidadPpal int(11) NOT NULL,       --Codigo de la  especialidad
  fechaNacContrato date,				   	   --Fecha de Inicio del Contrato del Especialista
  fechaNacRetiro date,				   	   	   --Fecha de Final del Contrato del Especialista
  diasActivos varchar(14) NOT NULL,			   --Dias que esta Activo en la Clinica
  PRIMARY KEY (idRifEsp)
);
---------------------------------------------------------------------------
-- Estructura de la tabla 'ESPECIALIDAD'
---------------------------------------------------------------------------
DROP TABLE IF EXISTS ESPECIALIDAD;
CREATE TABLE IF NOT EXISTS ESPECIALIDAD 
(
  codEspecialidad int(11) NOT NULL,       	--Codigo de la  especialidad
  descEspecialidad varchar(255) NOT NULL,   --Descripcion de la Especialidad
  PRIMARY KEY (codEspecialidad)
);