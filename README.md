# API Ficha 3230985

Diccionario de datos de un sistema de horarios trimestrales, con el mismo alcance que [Synchronize Center](https://synchronize-center.com/): ficha, programa, trimestre, instructor, ambiente y actividades.

Hay **21 entidades**, una por cada aprendiz de la ficha **3230985**. El orden de la tabla es el orden en que se llaman las migraciones.

Cada entidad guarda la identificación del aprendiz y su horario: día, hora, ambiente, instructor y el cumplimiento de `Actividad1` y `Actividad2`. En el listado ambas actividades están en `Si`.

## Orden de migración

| Orden | Migración | Tabla | Entidad | Aprendiz |
| --- | --- | --- | --- | --- |
| 1 | `2026_10_15_000001_create_juan_david_gamba_canon_table` | `juan_david_gamba_canon` | `JuanDavidGambaCanon` | Juan David Gamba Cañon |
| 2 | `2026_10_15_000002_create_danna_sofia_salcedo_cruz_table` | `danna_sofia_salcedo_cruz` | `DannaSofiaSalcedoCruz` | Danna Sofia Salcedo Cruz |
| 3 | `2026_10_15_000003_create_manuela_alejandra_barragan_bastidas_table` | `manuela_alejandra_barragan_bastidas` | `ManuelaAlejandraBarraganBastidas` | Manuela Alejandra Barragan Bastidas |
| 4 | `2026_10_15_000004_create_paula_andrea_medina_sanchez_table` | `paula_andrea_medina_sanchez` | `PaulaAndreaMedinaSanchez` | Paula Andrea Medina Sanchez |
| 5 | `2026_10_15_000005_create_julian_andres_becerra_guzman_table` | `julian_andres_becerra_guzman` | `JulianAndresBecerraGuzman` | Julian Andres Becerra Guzman |
| 6 | `2026_10_15_000006_create_esteban_rivera_salazar_table` | `esteban_rivera_salazar` | `EstebanRiveraSalazar` | Esteban Rivera Salazar |
| 7 | `2026_10_15_000007_create_eduar_santiago_galindo_avila_table` | `eduar_santiago_galindo_avila` | `EduarSantiagoGalindoAvila` | Eduar Santiago Galindo Avila |
| 8 | `2026_10_15_000008_create_jhony_styven_gaitan_sigua_table` | `jhony_styven_gaitan_sigua` | `JhonyStyvenGaitanSigua` | Jhony Styven Gaitan Sigua |
| 9 | `2026_10_15_000009_create_diego_alejandro_leal_suarez_table` | `diego_alejandro_leal_suarez` | `DiegoAlejandroLealSuarez` | Diego Alejandro Leal Suarez |
| 10 | `2026_10_15_000010_create_sergio_esteban_bermudez_toro_table` | `sergio_esteban_bermudez_toro` | `SergioEstebanBermudezToro` | Sergio Esteban Bermudez Toro |
| 11 | `2026_10_15_000011_create_juan_camilo_aricapa_garcia_table` | `juan_camilo_aricapa_garcia` | `JuanCamiloAricapaGarcia` | Juan Camilo Aricapa Garcia |
| 12 | `2026_10_15_000012_create_leidy_paola_tavera_tique_table` | `leidy_paola_tavera_tique` | `LeidyPaolaTaveraTique` | Leidy Paola Tavera Tique |
| 13 | `2026_10_15_000013_create_santiago_casallas_mosquera_table` | `santiago_casallas_mosquera` | `SantiagoCasallasMosquera` | Santiago Casallas Mosquera |
| 14 | `2026_10_15_000014_create_laura_sofia_perez_mazabuel_table` | `laura_sofia_perez_mazabuel` | `LauraSofiaPerezMazabuel` | Laura Sofia Perez Mazabuel |
| 15 | `2026_10_15_000015_create_carlos_andres_gonzalez_ramirez_table` | `carlos_andres_gonzalez_ramirez` | `CarlosAndresGonzalezRamirez` | Carlos Andres Gonzalez Ramirez |
| 16 | `2026_10_15_000016_create_joshua_alexander_galindo_reyes_table` | `joshua_alexander_galindo_reyes` | `JoshuaAlexanderGalindoReyes` | Joshua Alexander Galindo Reyes |
| 17 | `2026_10_15_000017_create_jonnathan_favian_maldonado_perez_table` | `jonnathan_favian_maldonado_perez` | `JonnathanFavianMaldonadoPerez` | Jonnathan Favian Maldonado Perez |
| 18 | `2026_10_15_000018_create_paula_lorena_obando_mendez_table` | `paula_lorena_obando_mendez` | `PaulaLorenaObandoMendez` | Paula Lorena Obando Mendez |
| 19 | `2026_10_15_000019_create_diego_andres_bohorquez_perez_table` | `diego_andres_bohorquez_perez` | `DiegoAndresBohorquezPerez` | Diego Andres Bohorquez Perez |
| 20 | `2026_10_15_000020_create_johan_sebastian_florez_quinonez_table` | `johan_sebastian_florez_quinonez` | `JohanSebastianFlorezQuinonez` | Johan Sebastian Florez Quiñonez |
| 21 | `2026_10_15_000021_create_juan_jose_acevedo_silva_table` | `juan_jose_acevedo_silva` | `JuanJoseAcevedoSilva` | Juan Jose Acevedo Silva |

Las 21 tablas comparten la misma estructura. `id` es la clave primaria. `numero_documento` es único. `created_at` y `updated_at` son obligatorios.

| Campo | Tipo | Nulo | Descripción |
| --- | --- | --- | --- |
| `id` | `bigint` | No | Identificador del horario del aprendiz |
| `tipo_documento` | `string(5)` | No | `CC` o `TI` |
| `numero_documento` | `string(20)` | No | Número de documento |
| `nombres` | `string(80)` | No | Nombres |
| `apellidos` | `string(80)` | No | Apellidos |
| `ficha` | `string(20)` | No | Número de ficha. Valor: `3230985` |
| `programa` | `string(200)` | No | Programa de formación asignado a la ficha |
| `trimestre` | `unsignedTinyInteger` | No | Trimestre del horario (1–4) |
| `anio` | `unsignedSmallInteger` | No | Año de la vigencia |
| `jornada` | `string(20)` | No | Mañana, tarde, noche o mixta |
| `dia` | `string(15)` | No | Día del bloque de horario |
| `hora_inicio` | `time` | No | Hora de inicio del bloque |
| `hora_fin` | `time` | No | Hora de fin del bloque |
| `ambiente` | `string(120)` | No | Ambiente de formación (nombre, especialidad y capacidad) |
| `instructor` | `string(150)` | No | Instructor del evento |
| `competencia` | `string(255)` | No | Competencia de la malla trimestral |
| `resultado_aprendizaje` | `text` | No | Resultado de aprendizaje programado |
| `actividad_1` | `string(2)` | No | Cumplimiento de Actividad 1. En el listado: `Si` |
| `actividad_2` | `string(2)` | No | Cumplimiento de Actividad 2. En el listado: `Si` |

## Diccionario de datos

### 1. JuanDavidGambaCanon

Aprendiz de la ficha 3230985. Migración `2026_10_15_000001_create_juan_david_gamba_canon_table`. Tabla `juan_david_gamba_canon`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1001327363 |
| `nombres` | JUAN DAVID |
| `apellidos` | GAMBA CAÑON |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 2. DannaSofiaSalcedoCruz

Aprendiz de la ficha 3230985. Migración `2026_10_15_000002_create_danna_sofia_salcedo_cruz_table`. Tabla `danna_sofia_salcedo_cruz`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1013110592 |
| `nombres` | DANNA SOFIA |
| `apellidos` | SALCEDO CRUZ |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 3. ManuelaAlejandraBarraganBastidas

Aprendiz de la ficha 3230985. Migración `2026_10_15_000003_create_manuela_alejandra_barragan_bastidas_table`. Tabla `manuela_alejandra_barragan_bastidas`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | TI |
| `numero_documento` | 1013117934 |
| `nombres` | MANUELA ALEJANDRA |
| `apellidos` | BARRAGAN BASTIDAS |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 4. PaulaAndreaMedinaSanchez

Aprendiz de la ficha 3230985. Migración `2026_10_15_000004_create_paula_andrea_medina_sanchez_table`. Tabla `paula_andrea_medina_sanchez`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1013120192 |
| `nombres` | PAULA ANDREA |
| `apellidos` | MEDINA SANCHEZ |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 5. JulianAndresBecerraGuzman

Aprendiz de la ficha 3230985. Migración `2026_10_15_000005_create_julian_andres_becerra_guzman_table`. Tabla `julian_andres_becerra_guzman`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1014862808 |
| `nombres` | JULIAN ANDRES |
| `apellidos` | BECERRA GUZMAN |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 6. EstebanRiveraSalazar

Aprendiz de la ficha 3230985. Migración `2026_10_15_000006_create_esteban_rivera_salazar_table`. Tabla `esteban_rivera_salazar`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1016595593 |
| `nombres` | ESTEBAN |
| `apellidos` | RIVERA SALAZAR |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 7. EduarSantiagoGalindoAvila

Aprendiz de la ficha 3230985. Migración `2026_10_15_000007_create_eduar_santiago_galindo_avila_table`. Tabla `eduar_santiago_galindo_avila`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1022354706 |
| `nombres` | EDUAR SANTIAGO |
| `apellidos` | GALINDO AVILA |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 8. JhonyStyvenGaitanSigua

Aprendiz de la ficha 3230985. Migración `2026_10_15_000008_create_jhony_styven_gaitan_sigua_table`. Tabla `jhony_styven_gaitan_sigua`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1022922375 |
| `nombres` | JHONY STYVEN |
| `apellidos` | GAITAN SIGUA |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 9. DiegoAlejandroLealSuarez

Aprendiz de la ficha 3230985. Migración `2026_10_15_000009_create_diego_alejandro_leal_suarez_table`. Tabla `diego_alejandro_leal_suarez`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1023373007 |
| `nombres` | DIEGO ALEJANDRO |
| `apellidos` | LEAL SUAREZ |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 10. SergioEstebanBermudezToro

Aprendiz de la ficha 3230985. Migración `2026_10_15_000010_create_sergio_esteban_bermudez_toro_table`. Tabla `sergio_esteban_bermudez_toro`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | TI |
| `numero_documento` | 1023377102 |
| `nombres` | SERGIO ESTEBAN |
| `apellidos` | BERMUDEZ TORO |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 11. JuanCamiloAricapaGarcia

Aprendiz de la ficha 3230985. Migración `2026_10_15_000011_create_juan_camilo_aricapa_garcia_table`. Tabla `juan_camilo_aricapa_garcia`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1023889974 |
| `nombres` | JUAN CAMILO |
| `apellidos` | ARICAPA GARCIA |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 12. LeidyPaolaTaveraTique

Aprendiz de la ficha 3230985. Migración `2026_10_15_000012_create_leidy_paola_tavera_tique_table`. Tabla `leidy_paola_tavera_tique`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1027525986 |
| `nombres` | LEIDY PAOLA |
| `apellidos` | TAVERA TIQUE |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 13. SantiagoCasallasMosquera

Aprendiz de la ficha 3230985. Migración `2026_10_15_000013_create_santiago_casallas_mosquera_table`. Tabla `santiago_casallas_mosquera`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1028484319 |
| `nombres` | SANTIAGO |
| `apellidos` | CASALLAS MOSQUERA |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 14. LauraSofiaPerezMazabuel

Aprendiz de la ficha 3230985. Migración `2026_10_15_000014_create_laura_sofia_perez_mazabuel_table`. Tabla `laura_sofia_perez_mazabuel`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1031812151 |
| `nombres` | LAURA SOFIA |
| `apellidos` | PEREZ MAZABUEL |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 15. CarlosAndresGonzalezRamirez

Aprendiz de la ficha 3230985. Migración `2026_10_15_000015_create_carlos_andres_gonzalez_ramirez_table`. Tabla `carlos_andres_gonzalez_ramirez`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1032360691 |
| `nombres` | CARLOS ANDRES |
| `apellidos` | GONZALEZ RAMIREZ |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 16. JoshuaAlexanderGalindoReyes

Aprendiz de la ficha 3230985. Migración `2026_10_15_000016_create_joshua_alexander_galindo_reyes_table`. Tabla `joshua_alexander_galindo_reyes`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1032678007 |
| `nombres` | JOSHUA ALEXANDER |
| `apellidos` | GALINDO REYES |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 17. JonnathanFavianMaldonadoPerez

Aprendiz de la ficha 3230985. Migración `2026_10_15_000017_create_jonnathan_favian_maldonado_perez_table`. Tabla `jonnathan_favian_maldonado_perez`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1055942038 |
| `nombres` | JONNATHAN FAVIAN |
| `apellidos` | MALDONADO PEREZ |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 18. PaulaLorenaObandoMendez

Aprendiz de la ficha 3230985. Migración `2026_10_15_000018_create_paula_lorena_obando_mendez_table`. Tabla `paula_lorena_obando_mendez`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1069899400 |
| `nombres` | PAULA LORENA |
| `apellidos` | OBANDO MENDEZ |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 19. DiegoAndresBohorquezPerez

Aprendiz de la ficha 3230985. Migración `2026_10_15_000019_create_diego_andres_bohorquez_perez_table`. Tabla `diego_andres_bohorquez_perez`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1094049396 |
| `nombres` | DIEGO ANDRES |
| `apellidos` | BOHORQUEZ PEREZ |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 20. JohanSebastianFlorezQuinonez

Aprendiz de la ficha 3230985. Migración `2026_10_15_000020_create_johan_sebastian_florez_quinonez_table`. Tabla `johan_sebastian_florez_quinonez`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | TI |
| `numero_documento` | 1105057969 |
| `nombres` | JOHAN SEBASTIAN |
| `apellidos` | FLOREZ QUIÑONEZ |
| `actividad_1` | Si |
| `actividad_2` | Si |

### 21. JuanJoseAcevedoSilva

Aprendiz de la ficha 3230985. Migración `2026_10_15_000021_create_juan_jose_acevedo_silva_table`. Tabla `juan_jose_acevedo_silva`.

| Campo | Valor |
| --- | --- |
| `tipo_documento` | CC |
| `numero_documento` | 1142515027 |
| `nombres` | JUAN JOSE |
| `apellidos` | ACEVEDO SILVA |
| `actividad_1` | Si |
| `actividad_2` | Si |
