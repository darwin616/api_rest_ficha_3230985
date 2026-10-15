# API Ficha 3230985

Diccionario de datos de un sistema de horarios trimestrales, con los mismos módulos que [Synchronize Center](https://synchronize-center.com/): programación trimestral, programas de formación, fichas, instructores, ambientes y malla trimestral.

Hay **21 entidades**. Cada aprendiz de la ficha tiene asignada una entidad. El orden de la tabla es el orden en que se llaman las migraciones: primero los catálogos y después las tablas que dependen de ellos.

Los aprendices se identifican solo por nombre. Este diccionario no guarda tipo ni número de documento.

## Orden de migración y aprendiz asignado

| Orden | Migración | Tabla | Entidad | Aprendiz |
| --- | --- | --- | --- | --- |
| 1 | `2026_10_15_000001_create_centros_table` | `centros` | `Centro` | Juan David Gamba Cañon |
| 2 | `2026_10_15_000002_create_roles_table` | `roles` | `Rol` | Danna Sofia Salcedo Cruz |
| 3 | `2026_10_15_000003_create_jornadas_table` | `jornadas` | `Jornada` | Manuela Alejandra Barragan Bastidas |
| 4 | `2026_10_15_000004_create_niveles_formacion_table` | `niveles_formacion` | `NivelFormacion` | Paula Andrea Medina Sanchez |
| 5 | `2026_10_15_000005_create_modalidades_table` | `modalidades` | `Modalidad` | Julian Andres Becerra Guzman |
| 6 | `2026_10_15_000006_create_dias_table` | `dias` | `Dia` | Esteban Rivera Salazar |
| 7 | `2026_10_15_000007_create_vigencias_table` | `vigencias` | `Vigencia` | Eduar Santiago Galindo Avila |
| 8 | `2026_10_15_000008_create_especialidades_table` | `especialidades` | `Especialidad` | Jhony Styven Gaitan Sigua |
| 9 | `2026_10_15_000009_create_tipos_vinculacion_table` | `tipos_vinculacion` | `TipoVinculacion` | Diego Alejandro Leal Suarez |
| 10 | `2026_10_15_000010_create_trimestres_table` | `trimestres` | `Trimestre` | Sergio Esteban Bermudez Toro |
| 11 | `2026_10_15_000011_create_usuarios_table` | `usuarios` | `Usuario` | Juan Camilo Aricapa Garcia |
| 12 | `2026_10_15_000012_create_programas_formacion_table` | `programas_formacion` | `ProgramaFormacion` | Leidy Paola Tavera Tique |
| 13 | `2026_10_15_000013_create_competencias_table` | `competencias` | `Competencia` | Santiago Casallas Mosquera |
| 14 | `2026_10_15_000014_create_resultados_aprendizaje_table` | `resultados_aprendizaje` | `ResultadoAprendizaje` | Laura Sofia Perez Mazabuel |
| 15 | `2026_10_15_000015_create_mallas_trimestrales_table` | `mallas_trimestrales` | `MallaTrimestral` | Carlos Andres Gonzalez Ramirez |
| 16 | `2026_10_15_000016_create_ambientes_table` | `ambientes` | `Ambiente` | Joshua Alexander Galindo Reyes |
| 17 | `2026_10_15_000017_create_instructores_table` | `instructores` | `Instructor` | Jonnathan Favian Maldonado Perez |
| 18 | `2026_10_15_000018_create_fichas_table` | `fichas` | `Ficha` | Paula Lorena Obando Mendez |
| 19 | `2026_10_15_000019_create_aprendices_table` | `aprendices` | `Aprendiz` | Diego Andres Bohorquez Perez |
| 20 | `2026_10_15_000020_create_programaciones_trimestrales_table` | `programaciones_trimestrales` | `ProgramacionTrimestral` | Johan Sebastian Florez Quiñonez |
| 21 | `2026_10_15_000021_create_eventos_formacion_table` | `eventos_formacion` | `EventoFormacion` | Juan Jose Acevedo Silva |

Convenciones:

- `id`: `bigint` autoincremental, clave primaria.
- `created_at` y `updated_at`: `timestamp`, obligatorios.
- Las claves foráneas usan `restrict` al borrar el padre.

## Diccionario de datos

### 1. Centro

Aprendiz asignado: Juan David Gamba Cañon.

Centro de formación que administra programas, ambientes, fichas e instructores.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `codigo` | `string(20)` | No | Único | Código del centro |
| `nombre` | `string(150)` | No | | Nombre del centro |
| `regional` | `string(120)` | No | | Regional a la que pertenece |
| `direccion` | `string(200)` | Sí | | Dirección de la sede |

### 2. Rol

Aprendiz asignado: Danna Sofia Salcedo Cruz.

Perfil de acceso: administrador, coordinador, instructor o aprendiz.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(50)` | No | Único | Nombre del rol |
| `descripcion` | `string(255)` | Sí | | Qué puede hacer ese rol |

### 3. Jornada

Aprendiz asignado: Manuela Alejandra Barragan Bastidas.

Franja de la ficha: mañana, tarde, noche o mixta.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(40)` | No | Único | Nombre de la jornada |
| `hora_inicio` | `time` | No | | Hora de apertura |
| `hora_fin` | `time` | No | | Hora de cierre |

### 4. NivelFormacion

Aprendiz asignado: Paula Andrea Medina Sanchez.

Nivel del programa: auxiliar, operario, técnico o tecnólogo.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(60)` | No | Único | Nombre del nivel |

### 5. Modalidad

Aprendiz asignado: Julian Andres Becerra Guzman.

Forma de impartir la formación: presencial, virtual o a distancia.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(60)` | No | Único | Nombre de la modalidad |

### 6. Dia

Aprendiz asignado: Esteban Rivera Salazar.

Día de la semana del bloque de horario. `orden` va de 1 (lunes) a 7 (domingo).

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(20)` | No | Único | Nombre del día |
| `orden` | `unsignedTinyInteger` | No | Único | Posición en la semana |

### 7. Vigencia

Aprendiz asignado: Eduar Santiago Galindo Avila.

Año lectivo. Es el filtro «Año» de la consulta de horarios.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `anio` | `unsignedSmallInteger` | No | Único | Año calendario |

### 8. Especialidad

Aprendiz asignado: Jhony Styven Gaitan Sigua.

Especialidad del ambiente o del instructor.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(120)` | No | Único | Nombre de la especialidad |
| `descripcion` | `string(255)` | Sí | | Detalle de la especialidad |

### 9. TipoVinculacion

Aprendiz asignado: Diego Alejandro Leal Suarez.

Forma de contratación del instructor: planta o contratista.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(40)` | No | Único | Nombre del tipo de vinculación |

### 10. Trimestre

Aprendiz asignado: Sergio Esteban Bermudez Toro.

Periodo 1 a 4 dentro de una vigencia. Es el filtro «Trimestre» de la consulta de horarios.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `vigencia_id` | `bigint` | No | FK → `vigencias.id` | Año al que pertenece |
| `numero` | `unsignedTinyInteger` | No | Único con `vigencia_id` | Número del trimestre (1–4) |
| `nombre` | `string(40)` | No | | Etiqueta visible |
| `fecha_inicio` | `date` | No | | Primer día del trimestre |
| `fecha_fin` | `date` | No | | Último día del trimestre |

### 11. Usuario

Aprendiz asignado: Juan Camilo Aricapa Garcia.

Cuenta de acceso al centro.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `rol_id` | `bigint` | No | FK → `roles.id` | Rol de la cuenta |
| `nombre` | `string(150)` | No | | Nombre visible |
| `correo` | `string(150)` | No | Único | Correo de ingreso |
| `password` | `string` | No | | Contraseña cifrada |
| `activo` | `boolean` | No | | `true` si puede iniciar sesión |

### 12. ProgramaFormacion

Aprendiz asignado: Leidy Paola Tavera Tique.

Programa que se asigna a las fichas. Módulo «Programas de Formación».

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `centro_id` | `bigint` | No | FK → `centros.id` | Centro que oferta el programa |
| `nivel_formacion_id` | `bigint` | No | FK → `niveles_formacion.id` | Nivel del programa |
| `modalidad_id` | `bigint` | No | FK → `modalidades.id` | Modalidad del programa |
| `codigo` | `string(20)` | No | Único con `version` | Código del programa |
| `version` | `string(10)` | No | Único con `codigo` | Versión del diseño curricular |
| `nombre` | `string(200)` | No | | Nombre del programa |
| `duracion_horas` | `unsignedInteger` | No | | Duración total en horas |
| `activo` | `boolean` | No | | `true` si se puede asignar a fichas nuevas |

### 13. Competencia

Aprendiz asignado: Santiago Casallas Mosquera.

Competencia del programa. La malla trimestral se arma con estas competencias.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `programa_formacion_id` | `bigint` | No | FK → `programas_formacion.id` | Programa dueño de la competencia |
| `codigo` | `string(20)` | No | Único con el programa | Código de la competencia |
| `nombre` | `string(255)` | No | | Nombre de la competencia |
| `horas` | `unsignedInteger` | No | | Horas de la competencia |

### 14. ResultadoAprendizaje

Aprendiz asignado: Laura Sofia Perez Mazabuel.

Resultado de aprendizaje de una competencia. Es la unidad que se programa en el horario.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `competencia_id` | `bigint` | No | FK → `competencias.id` | Competencia a la que pertenece |
| `codigo` | `string(20)` | No | Único con la competencia | Código del resultado |
| `nombre` | `text` | No | | Enunciado del resultado |
| `horas` | `unsignedInteger` | No | | Horas del resultado |

### 15. MallaTrimestral

Aprendiz asignado: Carlos Andres Gonzalez Ramirez.

Planeación de un programa para un trimestre. Módulo «Malla Trimestral».

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `programa_formacion_id` | `bigint` | No | FK → `programas_formacion.id` | Programa de la malla |
| `trimestre_id` | `bigint` | No | FK → `trimestres.id` | Trimestre de la malla |
| `resultado_aprendizaje_id` | `bigint` | No | FK → `resultados_aprendizaje.id` | Resultado incluido en la malla |
| `horas_programadas` | `unsignedInteger` | No | | Horas de ese resultado en el trimestre |
| `orden` | `unsignedSmallInteger` | No | | Orden de aparición en la malla |

Índice único: `programa_formacion_id` + `trimestre_id` + `resultado_aprendizaje_id`.

### 16. Ambiente

Aprendiz asignado: Joshua Alexander Galindo Reyes.

Espacio de formación. Módulo «Ambientes»: nombre, especialidad y capacidad.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `centro_id` | `bigint` | No | FK → `centros.id` | Centro dueño del ambiente |
| `especialidad_id` | `bigint` | Sí | FK → `especialidades.id` | Especialidad del ambiente |
| `codigo` | `string(20)` | No | Único con el centro | Código interno del ambiente |
| `nombre` | `string(120)` | No | | Nombre del ambiente |
| `tipo` | `string(30)` | No | | `aula`, `taller`, `laboratorio` o `virtual` |
| `capacidad` | `unsignedSmallInteger` | No | | Cupo de personas |
| `activo` | `boolean` | No | | `true` si se puede asignar a un horario |

### 17. Instructor

Aprendiz asignado: Jonnathan Favian Maldonado Perez.

Instructor asignado a eventos de formación. Módulo «Instructores».

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `usuario_id` | `bigint` | Sí | FK → `usuarios.id`, único | Cuenta de acceso, si tiene |
| `centro_id` | `bigint` | No | FK → `centros.id` | Centro de vinculación |
| `tipo_vinculacion_id` | `bigint` | No | FK → `tipos_vinculacion.id` | Planta o contratista |
| `especialidad_id` | `bigint` | Sí | FK → `especialidades.id` | Especialidad principal |
| `competencia_id` | `bigint` | Sí | FK → `competencias.id` | Competencia que puede dictar |
| `nombres` | `string(80)` | No | | Nombres |
| `apellidos` | `string(80)` | No | | Apellidos |
| `correo` | `string(150)` | No | Único | Correo institucional |
| `telefono` | `string(20)` | Sí | | Teléfono de contacto |
| `activo` | `boolean` | No | | `true` si puede recibir horario |

### 18. Ficha

Aprendiz asignado: Paula Lorena Obando Mendez.

Grupo de formación. Módulo «Fichas».

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `centro_id` | `bigint` | No | FK → `centros.id` | Centro de la ficha |
| `programa_formacion_id` | `bigint` | No | FK → `programas_formacion.id` | Programa asignado |
| `jornada_id` | `bigint` | No | FK → `jornadas.id` | Jornada de la ficha |
| `numero` | `string(20)` | No | Único | Número de ficha |
| `fecha_inicio` | `date` | No | | Inicio de la formación |
| `fecha_fin` | `date` | No | | Fin de la formación |
| `cupo` | `unsignedSmallInteger` | No | | Cupo de aprendices |
| `estado` | `string(30)` | No | | `en_formacion`, `finalizada` o `cancelada` |

### 19. Aprendiz

Aprendiz asignado: Diego Andres Bohorquez Perez.

Persona vinculada a una ficha. Solo se registran nombres y apellidos.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `usuario_id` | `bigint` | Sí | FK → `usuarios.id`, único | Cuenta de acceso, si tiene |
| `ficha_id` | `bigint` | No | FK → `fichas.id` | Ficha a la que pertenece |
| `nombres` | `string(80)` | No | | Nombres |
| `apellidos` | `string(80)` | No | | Apellidos |
| `correo` | `string(150)` | Sí | Único | Correo, si está registrado |
| `estado` | `string(20)` | No | | `activo`, `retirado` o `aplazado` |

### 20. ProgramacionTrimestral

Aprendiz asignado: Johan Sebastian Florez Quiñonez.

Horario trimestral de una ficha. Módulo «Programación Trimestral».

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `ficha_id` | `bigint` | No | FK → `fichas.id` | Ficha programada |
| `trimestre_id` | `bigint` | No | FK → `trimestres.id` | Trimestre de la programación |
| `estado` | `string(20)` | No | | `borrador`, `publicada` o `cerrada` |

Índice único: `ficha_id` + `trimestre_id`.

### 21. EventoFormacion

Aprendiz asignado: Juan Jose Acevedo Silva.

Bloque del horario: resultado, instructor, ambiente, día y rango de hora. Es la fila que se consulta por ficha, instructor o ambiente.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `programacion_trimestral_id` | `bigint` | No | FK → `programaciones_trimestrales.id` | Programación a la que pertenece |
| `resultado_aprendizaje_id` | `bigint` | No | FK → `resultados_aprendizaje.id` | Resultado que se dicta |
| `instructor_id` | `bigint` | No | FK → `instructores.id` | Instructor del bloque |
| `ambiente_id` | `bigint` | No | FK → `ambientes.id` | Ambiente del bloque |
| `dia_id` | `bigint` | No | FK → `dias.id` | Día de la semana |
| `hora_inicio` | `time` | No | | Hora de inicio |
| `hora_fin` | `time` | No | | Hora de fin |
| `fecha_inicio` | `date` | No | | Desde qué fecha aplica el bloque |
| `fecha_fin` | `date` | No | | Hasta qué fecha aplica el bloque |

Un instructor o un ambiente no pueden tener dos eventos solapados el mismo día y la misma franja dentro del mismo trimestre. Esa regla se valida al guardar el evento.

## Relaciones

```text
Centro 1──* ProgramaFormacion 1──* Competencia 1──* ResultadoAprendizaje
Centro 1──* Ambiente
Centro 1──* Instructor
Centro 1──* Ficha 1──* Aprendiz

Vigencia 1──* Trimestre 1──* MallaTrimestral *──1 ResultadoAprendizaje
ProgramaFormacion 1──* MallaTrimestral
ProgramaFormacion 1──* Ficha

Ficha 1──* ProgramacionTrimestral 1──* EventoFormacion
EventoFormacion *──1 Instructor
EventoFormacion *──1 Ambiente
EventoFormacion *──1 ResultadoAprendizaje
EventoFormacion *──1 Dia

Rol 1──* Usuario
```
