<?php
     #NOMBRE COMPLETO Y DE CUENTA, DESCRIPCION, TELEFONO
     $sql = "SELECT nombreCapellan, idFacultad, imagenPath, descripcion, telefono from capellanes where usuario = '$nombre'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $nombreCompleto = strtoupper($row['nombreCapellan']);
     $nombreArr = explode(' ',trim($nombreCompleto));
     $nombreCuenta = $nombreArr[0];


     #Traer datos segun la matricula dada
     if(isset($_GET['matricula']) && !empty($_GET['matricula'])){

          $matricula = mysqli_escape_string($con, $_GET['matricula']);

          $sql1 = "SELECT dp.nombre, dp.apellidos, dp.fechanacimiento,

          c.nombreCarrera, da.semestre, da.situacionAcademica,

          dd.estadoCivil, dd.tieneNovioa, dd.tieneAmigoEspecial, p.paisnombre, e.estadonombre, dd.municipio, dd.sexo, dd.preferenciaSexual, dd.residencia, dd.dormitorio, dd.direccion,

          df.edoCivilPadres, df.hijoEmpleadoUM, df.hijoObreroASD, df.tieneHermanosUM,

          dr.religion, dr.bautizadoASD, dr.fechaBautismo, dr.feligresiaActual, dr.iglesia, dr.AsistenciaCulto, dr.culto, dr.AsistenciaEscSab, dr.es, dr.ae,

          sb.esBecado, sb.tipoBeca, sb.departamento, sb.horasTrabajoDiario, sb.haColportado, sb.colportajeInter, sb.cuantosVeranos, sb.cuantosInviernos,

          ad.tieneBiblia, ad.tieneEscSabatica, ad.tienePlanEstudio,  ad.formatoBiblia, ad.formatoEscSabatica, ad.frecLecturaBiblicaSemanal, ad.tema, ad.estudiarMas,

          ja.perteneceClubJA, ja.clubJA, ja.esLider, ja.esAspirante, ja.participariasPlanMisionero, ja.dondeParticiparias,

          ds.comidasXDia, ds.diasSemanaComio, ds.ejercicioXSemana, ds.practicaDeporte, ds.cualDeporte, ds.consumeAlcohol, ds.consumeTabaco, ds.consumeDrogas, ds.sustanciaActiva, ds.padeceEnfermedad, ds.nombreEnfermedad, ds.tratamiento

          from alumnos as dp
          INNER JOIN datosacademicos as da ON dp.matricula = da.matricula
          INNER JOIN carrera as c ON da.idCarrera = c.idCarrera
          INNER JOIN datosdemograficos as dd ON dp.matricula = dd.matricula
          INNER JOIN paises as p ON dd.pais = p.id
          INNER JOIN estados as e ON dd.estado = e.id
          INNER JOIN datosfamiliares as df ON dp.matricula = df.matricula
          INNER JOIN datosreligiosos as dr ON dp.matricula = dr.matricula
          INNER JOIN serviciobecario as sb ON dp.matricula = sb.matricula
          INNER JOIN actividadesdevocionales as ad ON dp.matricula = ad.matricula
          INNER JOIN actividadesja as ja ON dp.matricula = ja.matricula
          INNER JOIN datossalud as ds ON dp.matricula = ds.matricula
          and dp.matricula = '$matricula' limit 1";

          $result1 = mysqli_query($con,$sql1);
          $result_array = mysqli_fetch_all($result1,MYSQLI_ASSOC);
          $row1 = $result_array[0];
          $count1 = mysqli_num_rows($result1);

          $sql2 = "SELECT usuarios.email from alumnos
          INNER JOIN usuarios ON alumnos.usuario = usuarios.nombre
          and alumnos.matricula = '$matricula'";
          $result2 = mysqli_query($con,$sql2);
          $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

          $email = $row2['email'];

          #DATOS PERSONALES
          $nombres = $row1['nombre'];
          $apellidos = $row1['apellidos'];
          $fechaNac = $row1['fechanacimiento'];

          #DATOS ACADEMICOS
          $nombreCarrera = $row1['nombreCarrera'];
          $semestre = $row1['semestre'];
          $situacionAcademica = $row1['situacionAcademica'];

          #DATOS DEMOGRAFICOS 
          $estadoCivil = $row1['estadoCivil'];
          $novio = $row1['tieneNovioa'];
          $amigo = $row1['tieneAmigoEspecial'];
          $pais = $row1['paisnombre'];
          $estado = $row1['estadonombre'];
          $municipio = $row1['municipio'];

          if($pais == 'México'){
               $sql_mun = "SELECT Municipio from municipios where idMunicipio = '$municipio'";
               $result2 = mysqli_query($con,$sql1);
               $row2 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
               $count2 = mysqli_num_rows($result1);

               $municipio = $row2['Municipio'];
          }

          $sexo = $row1['sexo'];
          $prefSexual = $row1['preferenciaSexual'];
          $residencia = $row1['residencia'];
          $dormitorio = $row1['dormitorio'];
          $direccion = $row1['direccion'];

          if($novio == ''){
               $novio = '---';
          }else if($novio == 0){
               $novio = 'No';
          }else if($novio == 1){
               $novio = 'Sí';
          }

          if($amigo == ''){
               $amigo = '---';
          }else if($amigo == 0){
               $amigo = 'No';
          }else if($amigo == 1){
               $amigo = 'Sí';
          }

          if($municipio != ''){
               $municipio = $municipio.', ';
          }

          if($dormitorio == ''){
               $dormitorio = '---';
          }

          if($direccion == ''){
               $direccion = '---';
          }

          #DATOS FAMILIARES
          $ecPadres = $row1['edoCivilPadres'];
          $hijoEmpleado = $row1['hijoEmpleadoUM'];
          $hijoObrero = $row1['hijoObreroASD'];
          $hermanos = $row1['tieneHermanosUM'];

          if($hijoEmpleado == 0){
               $hijoEmpleado = 'No';
          }else if($hijoEmpleado == 1){
               $hijoEmpleado = 'Sí';
          }

          if($hijoObrero == 0){
               $hijoObrero = 'No';
          }else if($hijoObrero == 1){
               $hijoObrero = 'Sí';
          }

          if($hermanos == 0){
               $hermanos = 'No';
          }else if($hermanos == 1){
               $hermanos = 'Sí';
          }

          #DATOS RELIGIOSOS
          $religion = $row1['religion'];
          $bautizado = $row1['bautizadoASD'];
          $fechaBautismo = $row1['fechaBautismo'];
          $feligresia = $row1['feligresiaActual'];
          $iglesia = $row1['iglesia'];
          $asistenciaCulto = $row1['AsistenciaCulto'];
          $culto = $row1['culto'];
          $asistenciaEs = $row1['AsistenciaEscSab'];
          $es = $row1['es'];
          $ae = $row1['ae'];

          if($bautizado == ''){
               $bautizado = '---';
          }else if($bautizado == 0){
               $bautizado = 'No';
          }else if($bautizado == 1){
               $bautizado = 'Sí';
          }

          if($fechaBautismo == ''){
               $fechaBautismo = '---';
          }

          if($feligresia == ''){
               $feligresia = '---';
          }

          if($asistenciaCulto == ''){
               $asistenciaCulto = '---';
          }else if($asistenciaCulto == 0){
               $asistenciaCulto = 'No';
          }else if($asistenciaCulto == 1){
               $asistenciaCulto = 'Sí';
          }

          if($culto == ''){
               $culto = '---';
          }

          if($asistenciaEs == ''){
               $asistenciaEs = '---';
          }else if($asistenciaEs == 0){
               $asistenciaEs = 'No';
          }else if($asistenciaEs == 1){
               $asistenciaEs = 'Sí';
          }

          if($es == ''){
               $es = '---';
          }
          
          
          #DATOS SERVICIO BECARIO
          $becado = $row1['esBecado'];
          $tipoBeca = $row1['tipoBeca'];
          $departamento = $row1['departamento'];
          $horasTrabajo = $row1['horasTrabajoDiario'];
          $colportado = $row1['haColportado'];;
          $colportajeInter = $row1['colportajeInter'];
          $veranos = $row1['cuantosVeranos'];
          $inviernos = $row1['cuantosInviernos'];

          if($becado == 0){
               $becado = 'No';
          }else if($becado == 1){
               $becado = 'Sí';
          }

          if($tipoBeca == ''){
               $tipoBeca = '---';
          }

          if($departamento == ''){
               $departamento = '---';
          }

          if($horasTrabajo == ''){
               $horasTrabajo = '---';
          }

          if($colportado == 0){
               $colportado = 'No';
          }else if($colportado == 1){
               $colportado = 'Sí';
          }

          if($colportajeInter == 0){
               $colportajeInter = 'No';
          }else if($colportajeInter == 1){
               $colportajeInter = 'Sí';
          }

          if($veranos == ''){
               $veranos = '---';
          }else if($veranos == 0){
               $veranos = 'No';
          }else if($veranos == 1){
               $veranos = 'Sí';
          }

          if($inviernos == ''){
               $inviernos = '---';
          }else if($inviernos == 0){
               $inviernos = 'No';
          }else if($inviernos == 1){
               $inviernos = 'Sí';
          }

          #DATOS ACTIVIDADES DEVOCIONALES
          $biblia = $row1['tieneBiblia'];
          $leccion = $row1['tieneEscSabatica'];
          $planEstudio = $row1['tienePlanEstudio'];
          $formatoBiblia = $row1['formatoBiblia'];
          $formatoEs = $row1['formatoEscSabatica'];
          $frecLectura = $row1['frecLecturaBiblicaSemanal'];
          $tema = $row1['tema'];
          $estudiarMas = $row1['estudiarMas'];

          if($biblia == 0){
               $biblia = 'No';
          }else if($biblia == 1){
               $biblia = 'Sí';
          }

          if($leccion == 0){
               $leccion = 'No';
          }else if($leccion == 1){
               $leccion = 'Sí';
          }

          if($planEstudio == 0){
               $planEstudio = 'No';
          }else if($planEstudio == 1){
               $planEstudio = 'Sí';
          }else if($planEstudio == ''){
               $planEstudio = '---';
          }

          if($formatoBiblia == ''){
               $formatoBiblia = '---';
          }

          if($formatoEs == ''){
               $formatoEs = '---';
          }

          if($frecLectura == ''){
               $frecLectura = '---';
          }

          if($estudiarMas == 0){
               $estudiarMas = 'No';
          }else if($estudiarMas == 1){
               $estudiarMas = 'Sí';
          }

          #DATOS ACTIVIDADES JA
          $perteneceClub = $row1['perteneceClubJA'];
          $club = $row1['clubJA'];
          $lider = $row1['esLider'];
          $aspirante = $row1['esAspirante'];
          $planMisionero = $row1['participariasPlanMisionero'];
          $dondePlan = $row1['dondeParticiparias'];

          if($perteneceClub == 0){
               $perteneceClub = 'No';
          }else if($perteneceClub == 1){
               $perteneceClub = 'Sí';
          }

          if($club == ''){
               $club = '---';
          }

          if($lider == ''){
               $lider = '---';
          }else if($lider == 0){
               $lider = 'No';
          }else if($lider == 1){
               $lider = 'Sí';
          }

          if($aspirante == ''){
               $aspirante = '---';
          }else if($aspirante == 0){
               $aspirante = 'No';
          }else if($aspirante == 1){
               $aspirante = 'Sí';
          }

          if($planMisionero == 0){
               $planMisionero = 'No';
          }else if($planMisionero == 1){
               $planMisionero = 'Sí';
          }

          if($dondePlan == ''){
               $dondePlan = '---';
          }else if($dondePlan == 0){
               $dondePlan = 'No';
          }else if($dondePlan == 1){
               $dondePlan = 'Sí';
          }

          #DATOS SALUD
          $comidasDia = $row1['comidasXDia'];
          $diasSemanaCome = $row1['diasSemanaComio'];
          $ejercicioSemana = $row1['ejercicioXSemana'];
          $practicaDeporte = $row1['practicaDeporte'];
          $deporte = $row1['cualDeporte'];
          $alcohol = $row1['consumeAlcohol'];
          $tabaco = $row1['consumeTabaco'];
          $drogas = $row1['consumeDrogas'];
          $sustancia = $row1['sustanciaActiva'];
          $padeceEnfermedad = $row1['padeceEnfermedad'];
          $enfermedad = $row1['nombreEnfermedad'];
          $tratamientos = $row1['tratamiento'];

          if($practicaDeporte == 0){
               $practicaDeporte = 'No';
          }else if($practicaDeporte == 1){
               $practicaDeporte = 'Sí';
          }

          if($deporte == ''){
               $deporte = '---';
          }

          if($alcohol == 0){
               $alcohol = 'No';
          }else if($alcohol == 1){
               $alcohol = 'Sí';
          }

          if($tabaco == 0){
               $tabaco = 'No';
          }else if($tabaco == 1){
               $tabaco = 'Sí';
          }

          if($drogas == 0){
               $drogas = 'No';
          }else if($drogas == 1){
               $drogas = 'Sí';
          }

          if($sustancia == ''){
               $sustancia = '---';
          }

          if($padeceEnfermedad == 0){
               $padeceEnfermedad = 'No';
          }else if($padeceEnfermedad == 1){
               $padeceEnfermedad = 'Sí';
          }

          if($enfermedad == ''){
               $enfermedad = '---';
          }

          if($tratamientos == ''){
               $tratamientos = '---';
          }

     }else{
          header("location:listaAlumnos");
     }
?>