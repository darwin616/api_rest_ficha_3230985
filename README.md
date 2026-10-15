# API Ficha 3230985

API de gestión de horarios trimestrales, alineada con los módulos de [Synchronize Center](https://synchronize-center.com/): programación trimestral, programas de formación, fichas, instructores, ambientes y malla trimestral.

La consulta pública de horarios se filtra por tipo de búsqueda, año y trimestre. Cada tabla del diccionario tiene una entidad Eloquent y un archivo de migración. El orden de abajo es el orden en que deben ejecutarse: primero los catálogos, después las tablas que dependen de ellos.

Las migraciones de infraestructura de Laravel ya existen y corren antes que el dominio:

| Orden | Migración | Tabla |
| --- | --- | --- |
| 0 | `0001_01_01_000000_create_users_table` | `users`, `password_reset_tokens`, `sessions` |
| 0 | `0001_01_01_000001_create_cache_table` | `cache`, `cache_locks` |
| 0 | `0001_01_01_000002_create_jobs_table` | `jobs`, `job_batches`, `failed_jobs` |

## Orden de migración del dominio

| Orden | Migración | Tabla | Entidad |
| --- | --- | --- | --- |
| 1 | `2026_10_15_000001_create_centros_table` | `centros` | `Centro` |
| 2 | `2026_10_15_000002_create_roles_table` | `roles` | `Rol` |
| 3 | `2026_10_15_000003_create_tipos_documento_table` | `tipos_documento` | `TipoDocumento` |
| 4 | `2026_10_15_000004_create_jornadas_table` | `jornadas` | `Jornada` |
| 5 | `2026_10_15_000005_create_niveles_formacion_table` | `niveles_formacion` | `NivelFormacion` |
| 6 | `2026_10_15_000006_create_modalidades_table` | `modalidades` | `Modalidad` |
| 7 | `2026_10_15_000007_create_dias_table` | `dias` | `Dia` |
| 8 | `2026_10_15_000008_create_vigencias_table` | `vigencias` | `Vigencia` |
| 9 | `2026_10_15_000009_create_trimestres_table` | `trimestres` | `Trimestre` |
| 10 | `2026_10_15_000010_create_especialidades_table` | `especialidades` | `Especialidad` |
| 11 | `2026_10_15_000011_create_tipos_vinculacion_table` | `tipos_vinculacion` | `TipoVinculacion` |
| 12 | `2026_10_15_000012_create_usuarios_table` | `usuarios` | `Usuario` |
| 13 | `2026_10_15_000013_create_programas_formacion_table` | `programas_formacion` | `ProgramaFormacion` |
| 14 | `2026_10_15_000014_create_competencias_table` | `competencias` | `Competencia` |
| 15 | `2026_10_15_000015_create_resultados_aprendizaje_table` | `resultados_aprendizaje` | `ResultadoAprendizaje` |
| 16 | `2026_10_15_000016_create_mallas_trimestrales_table` | `mallas_trimestrales` | `MallaTrimestral` |
| 17 | `2026_10_15_000017_create_malla_resultados_table` | `malla_resultados` | `MallaResultado` |
| 18 | `2026_10_15_000018_create_ambientes_table` | `ambientes` | `Ambiente` |
| 19 | `2026_10_15_000019_create_instructores_table` | `instructores` | `Instructor` |
| 20 | `2026_10_15_000020_create_instructor_competencias_table` | `instructor_competencias` | `InstructorCompetencia` |
| 21 | `2026_10_15_000021_create_fichas_table` | `fichas` | `Ficha` |
| 22 | `2026_10_15_000022_create_aprendices_table` | `aprendices` | `Aprendiz` |
| 23 | `2026_10_15_000023_create_ficha_aprendices_table` | `ficha_aprendices` | `FichaAprendiz` |
| 24 | `2026_10_15_000024_create_programaciones_trimestrales_table` | `programaciones_trimestrales` | `ProgramacionTrimestral` |
| 25 | `2026_10_15_000025_create_eventos_formacion_table` | `eventos_formacion` | `EventoFormacion` |
| 26 | `2026_10_15_000026_create_actividades_table` | `actividades` | `Actividad` |
| 27 | `2026_10_15_000027_create_aprendiz_actividades_table` | `aprendiz_actividades` | `AprendizActividad` |

Convenciones de cada tabla de negocio:

- `id`: `bigint` autoincremental, clave primaria.
- `created_at` y `updated_at`: `timestamp`, obligatorios.
- Las claves foráneas usan `restrict` al borrar el padre, salvo que el campo indique lo contrario.
- Los campos marcados como únicos no admiten duplicados.

## Diccionario de datos

### 1. Centro

Centro de formación que administra programas, ambientes, fichas e instructores. En Synchronize corresponde al centro (CDM).

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `codigo` | `string(20)` | No | Único | Código del centro |
| `nombre` | `string(150)` | No | | Nombre del centro |
| `regional` | `string(120)` | No | | Regional a la que pertenece |
| `direccion` | `string(200)` | Sí | | Dirección de la sede |

### 2. Rol

Perfil de acceso al sistema: administrador, coordinador, instructor o aprendiz.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(50)` | No | Único | Nombre del rol |
| `descripcion` | `string(255)` | Sí | | Qué puede hacer ese rol |

### 3. TipoDocumento

Catálogo de documentos de identidad usado por instructores y aprendices (`CC`, `TI`, `CE`, `PPT`).

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `codigo` | `string(10)` | No | Único | Sigla del documento |
| `nombre` | `string(80)` | No | | Nombre completo |

### 4. Jornada

Franja en la que se ofrece la ficha: mañana, tarde, noche o mixta.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(40)` | No | Único | Nombre de la jornada |
| `hora_inicio` | `time` | No | | Hora de apertura de la jornada |
| `hora_fin` | `time` | No | | Hora de cierre de la jornada |

### 5. NivelFormacion

Nivel del programa: auxiliar, operario, técnico o tecnólogo.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(60)` | No | Único | Nombre del nivel |

### 6. Modalidad

Forma de impartir la formación: presencial, virtual o a distancia.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(60)` | No | Único | Nombre de la modalidad |

### 7. Dia

Día de la semana en el que se ubica un evento de horario. `orden` va de 1 (lunes) a 7 (domingo).

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(20)` | No | Único | Nombre del día |
| `orden` | `unsignedTinyInteger` | No | Único | Posición en la semana |

### 8. Vigencia

Año lectivo. Es el filtro «Año» de la consulta de horarios.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `anio` | `unsignedSmallInteger` | No | Único | Año calendario |

### 9. Trimestre

Periodo 1 a 4 dentro de una vigencia. Es el filtro «Trimestre» de la consulta de horarios.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `vigencia_id` | `bigint` | No | FK → `vigencias.id` | Año al que pertenece |
| `numero` | `unsignedTinyInteger` | No | Único con `vigencia_id` | Número del trimestre (1–4) |
| `nombre` | `string(40)` | No | | Etiqueta visible, por ejemplo «Trimestre 1» |
| `fecha_inicio` | `date` | No | | Primer día del trimestre |
| `fecha_fin` | `date` | No | | Último día del trimestre |

### 10. Especialidad

Especialidad del ambiente o del instructor (diseño, metrología, software, etc.).

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(120)` | No | Único | Nombre de la especialidad |
| `descripcion` | `string(255)` | Sí | | Detalle de la especialidad |

### 11. TipoVinculacion

Forma de contratación del instructor: planta o contratista.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `nombre` | `string(40)` | No | Único | Nombre del tipo de vinculación |

### 12. Usuario

Cuenta de acceso asociada a un rol. Se usa para ingresar al centro, igual que el login de Synchronize. El documento y los datos académicos viven en `Instructor` o `Aprendiz`.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `rol_id` | `bigint` | No | FK → `roles.id` | Rol de la cuenta |
| `nombre` | `string(150)` | No | | Nombre visible |
| `correo` | `string(150)` | No | Único | Correo de ingreso |
| `password` | `string` | No | | Contraseña cifrada |
| `activo` | `boolean` | No | | `true` si puede iniciar sesión |

### 13. ProgramaFormacion

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

### 14. Competencia

Competencia del programa. La malla trimestral agrupa competencias y sus resultados.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `programa_formacion_id` | `bigint` | No | FK → `programas_formacion.id` | Programa dueño de la competencia |
| `codigo` | `string(20)` | No | Único con el programa | Código de la competencia |
| `nombre` | `string(255)` | No | | Nombre de la competencia |
| `horas` | `unsignedInteger` | No | | Horas de la competencia |

### 15. ResultadoAprendizaje

Resultado de aprendizaje de una competencia. Es la unidad que se programa en el horario.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `competencia_id` | `bigint` | No | FK → `competencias.id` | Competencia a la que pertenece |
| `codigo` | `string(20)` | No | Único con la competencia | Código del resultado |
| `nombre` | `text` | No | | Enunciado del resultado |
| `horas` | `unsignedInteger` | No | | Horas del resultado |

### 16. MallaTrimestral

Planeación de un programa para un trimestre: qué resultados se ven en ese periodo. Módulo «Malla Trimestral».

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `programa_formacion_id` | `bigint` | No | FK → `programas_formacion.id` | Programa de la malla |
| `trimestre_id` | `bigint` | No | FK → `trimestres.id` | Trimestre de la malla |
| `nombre` | `string(150)` | No | | Nombre de la malla |
| `descripcion` | `text` | Sí | | Observación de la planeación |

Índice único: `programa_formacion_id` + `trimestre_id`.

### 17. MallaResultado

Resultado de aprendizaje incluido en una malla, con las horas que se dictan en ese trimestre.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `malla_trimestral_id` | `bigint` | No | FK → `mallas_trimestrales.id` | Malla que incluye el resultado |
| `resultado_aprendizaje_id` | `bigint` | No | FK → `resultados_aprendizaje.id` | Resultado programado |
| `horas_programadas` | `unsignedInteger` | No | | Horas de ese resultado en el trimestre |
| `orden` | `unsignedSmallInteger` | No | | Orden de aparición en la malla |

Índice único: `malla_trimestral_id` + `resultado_aprendizaje_id`.

### 18. Ambiente

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

### 19. Instructor

Instructor asignado a eventos de formación. Módulo «Instructores».

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `usuario_id` | `bigint` | Sí | FK → `usuarios.id`, único | Cuenta de acceso, si tiene |
| `centro_id` | `bigint` | No | FK → `centros.id` | Centro de vinculación |
| `tipo_documento_id` | `bigint` | No | FK → `tipos_documento.id` | Tipo de documento |
| `tipo_vinculacion_id` | `bigint` | No | FK → `tipos_vinculacion.id` | Planta o contratista |
| `especialidad_id` | `bigint` | Sí | FK → `especialidades.id` | Especialidad principal |
| `numero_documento` | `string(20)` | No | Único | Número de documento |
| `nombres` | `string(80)` | No | | Nombres |
| `apellidos` | `string(80)` | No | | Apellidos |
| `correo` | `string(150)` | No | Único | Correo institucional |
| `telefono` | `string(20)` | Sí | | Teléfono de contacto |
| `activo` | `boolean` | No | | `true` si puede recibir horario |

### 20. InstructorCompetencia

Competencias que el instructor está habilitado para dictar. Sirve para proponer instructor al armar el horario.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `instructor_id` | `bigint` | No | FK → `instructores.id` | Instructor habilitado |
| `competencia_id` | `bigint` | No | FK → `competencias.id` | Competencia que puede dictar |

Índice único: `instructor_id` + `competencia_id`.

### 21. Ficha

Grupo de formación (ficha de caracterización). El número `3230985` es una ficha. Módulo «Fichas».

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

### 22. Aprendiz

Persona matriculada. Los datos de identificación coinciden con el listado de la ficha: tipo de documento, número, nombres y apellidos.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `usuario_id` | `bigint` | Sí | FK → `usuarios.id`, único | Cuenta de acceso, si tiene |
| `tipo_documento_id` | `bigint` | No | FK → `tipos_documento.id` | Tipo de documento |
| `numero_documento` | `string(20)` | No | Único | Número de documento |
| `nombres` | `string(80)` | No | | Nombres |
| `apellidos` | `string(80)` | No | | Apellidos |
| `correo` | `string(150)` | Sí | Único | Correo, si está registrado |
| `telefono` | `string(20)` | Sí | | Teléfono de contacto |

### 23. FichaAprendiz

Matrícula del aprendiz en una ficha. Un aprendiz puede pasar por varias fichas; una ficha tiene muchos aprendices.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `ficha_id` | `bigint` | No | FK → `fichas.id` | Ficha |
| `aprendiz_id` | `bigint` | No | FK → `aprendices.id` | Aprendiz |
| `fecha_ingreso` | `date` | No | | Fecha de matrícula |
| `fecha_retiro` | `date` | Sí | | Fecha de retiro, si aplica |
| `estado` | `string(20)` | No | | `activo`, `retirado` o `aplazado` |

Índice único: `ficha_id` + `aprendiz_id`.

### 24. ProgramacionTrimestral

Horario trimestral de una ficha sobre una malla. Módulo «Programación Trimestral».

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `ficha_id` | `bigint` | No | FK → `fichas.id` | Ficha programada |
| `malla_trimestral_id` | `bigint` | No | FK → `mallas_trimestrales.id` | Malla que se ejecuta |
| `trimestre_id` | `bigint` | No | FK → `trimestres.id` | Trimestre de la programación |
| `estado` | `string(20)` | No | | `borrador`, `publicada` o `cerrada` |

Índice único: `ficha_id` + `trimestre_id`.

### 25. EventoFormacion

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

Un instructor o un ambiente no pueden tener dos eventos solapados el mismo día y la misma franja dentro del mismo trimestre. Esa regla se valida en la aplicación al guardar el evento.

### 26. Actividad

Actividad o evidencia asociada a un resultado dentro de la ficha. En el listado de aprendices aparecen como `Actividad1` y `Actividad2`.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `ficha_id` | `bigint` | No | FK → `fichas.id` | Ficha en la que se realiza |
| `resultado_aprendizaje_id` | `bigint` | No | FK → `resultados_aprendizaje.id` | Resultado que evalúa |
| `nombre` | `string(120)` | No | | Nombre, por ejemplo «Actividad 1» |
| `descripcion` | `text` | Sí | | Qué debe entregar o demostrar el aprendiz |
| `fecha` | `date` | Sí | | Fecha prevista |

### 27. AprendizActividad

Cumplimiento de una actividad por un aprendiz de la ficha. El valor `Si` del listado se guarda como `cumplio = true`.

| Campo | Tipo | Nulo | Clave | Descripción |
| --- | --- | --- | --- | --- |
| `id` | `bigint` | No | PK | Identificador |
| `actividad_id` | `bigint` | No | FK → `actividades.id` | Actividad |
| `aprendiz_id` | `bigint` | No | FK → `aprendices.id` | Aprendiz |
| `cumplio` | `boolean` | No | | `true` si la realizó |
| `observacion` | `string(255)` | Sí | | Nota del instructor |

Índice único: `actividad_id` + `aprendiz_id`.

## Relaciones

```text
Centro 1──* ProgramaFormacion 1──* Competencia 1──* ResultadoAprendizaje
Centro 1──* Ambiente
Centro 1──* Instructor
Centro 1──* Ficha

Vigencia 1──* Trimestre 1──* MallaTrimestral *──* ResultadoAprendizaje
ProgramaFormacion 1──* MallaTrimestral
ProgramaFormacion 1──* Ficha

Ficha *──* Aprendiz
Ficha 1──* ProgramacionTrimestral 1──* EventoFormacion
EventoFormacion *──1 Instructor
EventoFormacion *──1 Ambiente
EventoFormacion *──1 ResultadoAprendizaje
EventoFormacion *──1 Dia

Instructor *──* Competencia
Ficha 1──* Actividad 1──* AprendizActividad *──1 Aprendiz

Rol 1──* Usuario 1──0..1 Instructor
Usuario 1──0..1 Aprendiz
```
