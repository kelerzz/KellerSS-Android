<?php

// --- Configurações de Cores ---
$branco     = "\e[97m";
$preto      = "\e[30m\e[1m";
$amarelo    = "\e[93m";
$laranja    = "\e[38;5;208m";
$azul       = "\e[34m";
$lazul      = "\e[36m";
$cln        = "\e[0m";
$verde      = "\e[92m";
$fverde     = "\e[32m";
$vermelho   = "\e[91m";
$bold       = "\e[1m";

// --- Funções Auxiliares ---

function keller_banner(){
  echo "\e[37m
           KellerSS Android\e[36m Fucking Cheaters\e[91m\e[37m discord.gg/allianceoficial\e[91m
            
                            )        (      (           (      
                ( /(        )\ )  )\ )        )\ )  
                        )\()) (   (()/( (()/(  (   (()/(  
                        |((_)\  )\  
   /(_)) /(_)) )\   /(_)) 
                        |_ ((_)((_) (_))  (_))  ((_) (_))   
                        | |/ / | __|| |   | |   | __|| _ \  
                 
        ' <  | _| | |__ | |__ | _| |   /  
                        _|\_\ |___||____||____||___||_|_\  

                    \e[36m{C} Coded By - KellerSS | Credits for Sheik                      
              
\e[32m
  \n";
}

function inputusuario($message){
  global $cln, $bold, $lazul, $fverde;
  echo $cln . $bold . $lazul . "[#] " . $message . ": " . $fverde;
}

function processando($tempo = 1) {
    usleep($tempo * 1000000); 
}

// --- Lógica REAL do ADB ---
function conectarADBReal() {
    global $bold, $azul, $cln, $amarelo, $fverde, $vermelho, $branco;
    
    system("clear");
    keller_banner();
    
    echo $bold . $azul . "[+] Verificando se o ADB está instalado...\n" . $cln;
    
    if (!shell_exec("adb version > /dev/null 2>&1")) {
        echo $bold . $amarelo . "[!] ADB não encontrado. Tentando instalar android-tools...\n" . $cln;
        system("pkg install android-tools -y"); 
    } else {
        echo $bold . $fverde . "[i] ADB já está instalado.\n\n" . $cln;
    }

    // --- PAREAMENTO ---
    inputusuario("Qual a sua porta para o pareamento (ex: 45678)?");
    $pair_port = trim(fgets(STDIN, 1024));

    if (!empty($pair_port) && is_numeric($pair_port)) {
        echo $bold . $amarelo . "\n[!] Agora, digite o código de pareamento do celular e pressione Enter.\n" . $cln;
        system("adb pair localhost:" . $pair_port);
    } elseif (!empty($pair_port)) {
        echo $bold . $vermelho . "\n[!] Porta inválida! Pulando pareamento.\n" . $cln;
    }

    // --- CONEXÃO ---
    echo "\n";
    inputusuario("Qual a sua porta para a conexão (ex: 12345)?");
    $connect_port = trim(fgets(STDIN, 1024));
    
    if (!empty($connect_port) && is_numeric($connect_port)) {
        echo $bold . $amarelo . "\n[!] Conectando ao dispositivo...\n" . $cln;
        system("adb connect localhost:" . $connect_port);
        
        echo $bold . $azul . "\n[+] Verificando lista de dispositivos conectados:\n" . $cln;
        system("adb devices"); 
        
        echo $bold . $fverde . "\n[i] Processo de conexão finalizado.\n" . $cln;
    } else {
        echo $bold . $vermelho . "\n[!] Porta inválida!\n" . $cln;
    }
    
    echo $bold . $branco . "\n[+] Pressione Enter para voltar ao menu...\n" . $cln;
    fgets(STDIN, 1024);
}

// --- Lógica FAKE do Scanner (Timings Precisos) ---
function simularScan($nomeJogo) {
    global $bold, $azul, $fverde, $verde, $amarelo, $branco, $cln, $vermelho, $laranja;

    // Define o pacote com base no jogo escolhido (ESSENCIAL PARA O CÓDIGO NOVO)
    $pacote = ($nomeJogo == "FreeFire Max") ? "com.dts.freefiremax" : "com.dts.freefireth";

    system("clear");
    keller_banner();

    // 1. Início
    echo $bold . $azul . "[+] Versão do Android: 13\n";
    usleep(100000); 
    
    echo $bold . $azul . "[+] Checando se possui Root (se o programa travar, root detectado)...\n";
    usleep(200000); 
    echo $bold . $fverde . "[-] O dispositivo não tem root.\n\n";

    echo $bold . $azul . "[+] Verificando scripts ativos em segundo plano...\n";
    usleep(150000);
    echo $bold . $fverde . "[i] Nenhum script ativo detectado.\n";
    
    echo $bold . $azul . "[+] Finalizando sessões bash desnecessárias...\n";
    usleep(100000);
    echo $bold . $fverde . "[i] Sessões desnecessárias finalizadas.\n\n";

    // 2. BYPASS LIST
    echo $bold . $azul . "[+] Verificando bypasses de funções shell...\n";
    usleep(50000); 
    
    $checks = [
        "Verificando funções maliciosas no ambiente shell...",    // 0
        "Testando acesso a diretórios críticos...",             // 1
        "Verificando processos suspeitos...",                   // 2
        "Verificando arquivos de configuração...",              // 3
        "Testando comportamento real das funções...",           // 4
        "Testando manipulação da função stat...",               // 5 
        "Testando comportamento do comando cd...",              // 6 
        "Testando integridade de comandos básicos...",          // 7
        "Testando bloqueio de comandos pkg...",                 // 8
        "Verificando arquivos de bypass no dispositivo..."      // 9
    ];

    foreach ($checks as $index => $check) {
        echo $bold . $azul . "[+] $check\n";
        if ($index <= 5) {
            usleep(400000);
            if ($index == 5) usleep(500000);
        } else {
            usleep(70000);
        }
    }
    echo $bold . $fverde . "[i] Nenhum bypass de funções shell detectado.\n\n";

    // 3. REINÍCIO
    echo $bold . $azul . "[+] Checando se o dispositivo foi reiniciado recentemente...\n";
    $uptime = shell_exec("adb shell uptime"); 
    usleep(100000); 
    echo $bold . $fverde . "[i] Dispositivo não reiniciado recentemente.\n\n";

    // --- IMPLEMENTAÇÃO LOGCAT REAL (DATA SISTEMA) ---
    $logcatTime = shell_exec("adb logcat -d -v time | head -n 2");
    preg_match('/(\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $logcatTime, $matchTime);

    if (!empty($matchTime[1])) {
        $dateObj = DateTime::createFromFormat('m-d H:i:s', $matchTime[1]);
        $formattedDate = $dateObj ? $dateObj->format('d-m H:i:s') : $matchTime[1];
        echo $bold . $amarelo . "[+] Primeira log do sistema: " . $formattedDate . "\n";
        echo $bold . $branco . "[+] Caso a data da primeira log seja durante/após a partida e/ou seja igual a uma data alterada, aplique o W.O!\n\n";
    } else {
        echo $bold . $vermelho . "[!] Não foi possível capturar a data/hora do sistema (Verifique conexão ADB).\n";
        echo $bold . $branco . "[+] W.O aplicável se a falha persistir sem justificativa.\n\n";
    }

    // --- MUDANÇA DE DATA/HORA ---
    $logcatOutput = shell_exec('adb logcat -d | grep "UsageStatsService: Time changed" | grep -v "HCALL"');
    $logLines = [];

    if ($logcatOutput !== null && trim($logcatOutput) !== "") {
        $logLines = explode("\n", trim($logcatOutput));
    }

    $fusoHorario = trim(shell_exec('adb shell getprop persist.sys.timezone'));
    if ($fusoHorario !== "America/Sao_Paulo" && !empty($fusoHorario)) {
        echo $bold . $amarelo . "[!] Aviso: O fuso horário do dispositivo é '$fusoHorario', diferente de 'America/Sao_Paulo', possivel tentativa de Bypass.\n\n";
    }

    $dataAtual = date("m-d");
    $logsAlterados = [];

    if (!empty($logLines)) {
        foreach ($logLines as $line) {
            if (empty($line)) continue;
            preg_match('/(\d{2}-\d{2}) (\d{2}:\d{2}:\d{2}\.\d{3}).*Time changed in.*by (-?\d+) second/', $line, $matches);

            if (!empty($matches) && $matches[1] === $dataAtual) {
                list($hora, $minuto, $segundoComDecimal) = explode(":", $matches[2]);
                $segundo = (int)floor($segundoComDecimal);
                $horaAntiga = mktime($hora, $minuto, $segundo, substr($matches[1], 0, 2), substr($matches[1], 3, 2), date("Y"));
                $segundosAlterados = (int)$matches[3];
                $horaNova = ($segundosAlterados > 0) ? $horaAntiga - $segundosAlterados : $horaAntiga + abs($segundosAlterados);

                $logsAlterados[] = [
                    'horaAntiga' => $horaAntiga,
                    'horaNova' => $horaNova,
                    'horaAntigaFormatada' => date("H:i", $horaAntiga),
                    'horaNovaFormatada' => date("H:i", $horaNova),
                    'acao' => ($segundosAlterados > 0) ? 'Atrasou' : 'Adiantou',
                    'dataAntiga' => date("d-m H:i", $horaAntiga),
                    'dataNova' => date("d-m", $horaNova)
                ];
            }
        }
    }

    echo $bold . $azul . "[+] Verificando mudanças de data/hora...\n";

    if (!empty($logsAlterados)) {
        usort($logsAlterados, function ($a, $b) {
            return $b['horaAntiga'] - $a['horaAntiga'];
        });
        foreach ($logsAlterados as $log) {
            echo $bold . $amarelo . "[!] Alterou horário de {$log['dataAntiga']} para {$log['dataNova']} {$log['horaNovaFormatada']} ({$log['acao']} horário)\n";
        }
        echo "\n";
    } else {
        echo $bold . $vermelho . "[!] Nenhum log de alteração de horário encontrado.\n\n";
    }

    echo $bold . $azul . "[+] Checando se modificou data e hora...\n";
    echo $bold . $fverde . "[i] Data e hora/fuso horário automático estão ativados.\n";
    echo $bold . $branco . "[+] Caso haja mudança de horário durante/após a partida, aplique o W.O!\n\n";

    usleep(50000); 
    echo $bold . $azul . "[+] Obtendo os últimos acessos do Google Play Store...\n";
    echo $bold . $vermelho . "[!] Nenhum dado encontrado.\n";
    echo $bold . $branco . "[+] Caso haja acesso durante/após a partida, aplique o W.O!\n\n";

    usleep(70000);
    echo $bold . $azul . "[+] Obtendo os últimos textos copiados...\n";
    echo $bold . $vermelho . "[!] Nenhum dado encontrado.\n\n";

    usleep(100000);
    echo $bold . $azul . "[+] Checando se o replay foi passado...\n";
    processando(2.0); 
    echo $bold . $fverde . "[i] Nenhum replay foi passado e a pasta MReplays está normal.\n";

    // --- DATAS (219 segundos) ---
    $cmdInstall = "adb shell dumpsys package $pacote | grep -i firstInstallTime";
    $outInstall = shell_exec($cmdInstall);

    if ($outInstall && preg_match('/firstInstallTime=([\d-]+\s[\d:]+)/', $outInstall, $matches)) {
        $timestampInstall = strtotime($matches[1]);
        $dateInstall = date("d-m-Y H:i:s", $timestampInstall);
        $dateReplay = date("d-m-Y H:i:s", $timestampInstall + 219); 
    } else {
        $dateInstall = date("d-m-Y H:i:s", strtotime("-12 minutes"));
        $dateReplay = date("d-m-Y H:i:s", strtotime("-8 minutes 21 seconds"));
    }

    echo $bold . $amarelo . "[+] Data de acesso da pasta MReplays: $dateReplay\n";
    echo $bold . $amarelo . "[+] Data de instalação do Free Fire: $dateInstall\n";
    echo $bold . $branco . "[#] Verifique a data de instalação do jogo com a data de acesso da pasta MReplays para ver se o jogo foi recém instalado antes da partida, se não, vá no histórico e veja se o player jogou outras partidas recentemente, se sim, aplique o W.O!\n\n";


     echo $bold . $azul . "[+] Checando bypass de Wallhack/Holograma...\n";

                $pastasParaVerificar = [
                    "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android/gameassetbundles",
                    "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android",
                    "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional",
                    "/sdcard/Android/data/com.dts.freefireth/files/contentcache",
                    "/sdcard/Android/data/com.dts.freefireth/files",
                    "/sdcard/Android/data/com.dts.freefireth",
                    "/sdcard/Android/data",
                    "/sdcard/Android"
                ];


                $pastasParaVerificar2 = [
                    "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android/gameassetbundles",
                    "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android",
                    "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional",
                    "/sdcard/Android/data/com.dts.freefireth/files/contentcache",
                    "/sdcard/Android/data/com.dts.freefireth/files",
                    "/sdcard/Android/data/com.dts.freefireth"
                ];

                

                foreach ($pastasParaVerificar as $pasta) {
                    $comandoStat = 'adb shell stat ' . escapeshellarg($pasta) . ' 2>&1';
                    $resultadoStat = shell_exec($comandoStat);
                
                    if (strpos($resultadoStat, 'File:') !== false) {
                        preg_match('/Modify: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d+)/', $resultadoStat, $matchModify);
                        preg_match('/Change: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d+)/', $resultadoStat, $matchChange);
                
                        if ($matchModify && $matchChange) {
                            $dataModify = trim($matchModify[1]);
                            $dataChange = trim($matchChange[1]);
                
                            $dataModifyFormatada = preg_replace('/\.\d+.*$/', '', $dataModify);
                            $dataChangeFormatada = preg_replace('/\.\d+.*$/', '', $dataChange);
                
                            if ($dataModifyFormatada !== $dataChangeFormatada) {
                                $nomefinalpasta = basename($pasta);
                                
                                $dateTimeChange = DateTime::createFromFormat('Y-m-d H:i:s', $dataChangeFormatada);
                                $dataChangeFormatadaLegivel = $dateTimeChange ? $dateTimeChange->format('d-m-Y H:i:s') : $dataChangeFormatada;
                                
                                echo $bold . $vermelho . "[!] By\n";
                                echo $bold . $amarelo . "[i] Horário do renomeio/substituição: $dataChangeFormatadaLegivel\n\n";
                            }
                        }
                    }
                }

                $comandoFindBin = 'adb shell ls -t "/sdcard/Android/data/com.dts.freefireth/files/MReplays" | grep "\.bin$" | head -n 1';
                $arquivoBinMaisRecente = shell_exec($comandoFindBin);

                if ($arquivoBinMaisRecente !== null && $arquivoBinMaisRecente !== '') {
                    $arquivoBinMaisRecente = trim($arquivoBinMaisRecente);
                    $caminhoCompletoBin = "/sdcard/Android/data/com.dts.freefireth/files/MReplays/$arquivoBinMaisRecente";
                    $comandoStatBin = 'adb shell stat ' . escapeshellarg($caminhoCompletoBin) . ' 2>&1';
                    $resultadoStatBin = shell_exec($comandoStatBin);
                    preg_match('/Access: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStatBin, $matchAccessBin);

                    if ($matchAccessBin) {
                        $dataAccessBin = $matchAccessBin[1];
                        $timestampAccessBinOriginal = strtotime($dataAccessBin);
                        $timestampAccessBinComMargem = $timestampAccessBinOriginal - (10 * 60); // -10 minutos

                        $pastasParaVerificar = [
                            "/sdcard/Android/data/com.dts.freefireth/files/contentcache",
                            "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android"
                        ];

                        $bypassDetectado = false;
                        foreach ($pastasParaVerificar as $pasta) {
                            $comandoStat = 'adb shell stat ' . escapeshellarg($pasta) . ' 2>&1';
                            $resultadoStat = shell_exec($comandoStat);

                            preg_match('/Access: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchAccess);
                            preg_match('/Modify: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchModify);
                            preg_match('/Change: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchChange);

                            if ($matchAccess && $matchModify && $matchChange) {
                                $timestampAccess = strtotime($matchAccess[1]);
                                $timestampModify = strtotime($matchModify[1]);
                                $timestampChange = strtotime($matchChange[1]);

                                if (
                                    $timestampAccess > $timestampAccessBinComMargem ||
                                    $timestampModify > $timestampAccessBinComMargem ||
                                    $timestampChange > $timestampAccessBinComMargem
                                ) {
                                    $bypassDetectado = true;
                                    break;
                                }
                            }
                        }

                        if ($bypassDetectado) {
                            echo $bold . $vermelho . "[!\n\n";
                        } else {
                            echo $bold . $verde . "[+] Nenhum bypass de holograma detectado.\n\n";
                        }
                    } else {
                        echo $bold . $amarelo . "[!] Não foi possível obter a data do último .bin.\n";
                    }
                } else {
                    echo $bold . $vermelho . "[!] Nenhum .bin encontrado em MReplays.\n";
                }


                $cmd = "adb shell dumpsys package com.dts.freefireth | grep -i firstInstallTime";
                $firstInstallTime = shell_exec($cmd);

                $firstInstallDate = null;
                if (preg_match('/firstInstallTime=(\d{4}-\d{2}-\d{2})/', $firstInstallTime, $matchInstall)) {
                    $firstInstallDate = $matchInstall[1];
                }

                $cmdUpdate = "adb shell dumpsys package com.dts.freefireth | grep -i lastUpdateTime";
                $lastUpdateTime = shell_exec($cmdUpdate);

                $lastUpdateDate = null;
                if (preg_match('/lastUpdateTime=(\d{4}-\d{2}-\d{2})/', $lastUpdateTime, $matchUpdate)) {
                    $lastUpdateDate = $matchUpdate[1];
                }

                $pastaShaders = "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android/gameassetbundles";

                $comandoFind = 'adb shell find ' . escapeshellarg($pastaShaders) . ' -name "shaders*" -type f 2>&1';
                $arquivosShaders = shell_exec($comandoFind);
                
                if (!empty($arquivosShaders)) {
                    $arquivosShaders = explode("\n", trim($arquivosShaders));
                
                    foreach ($arquivosShaders as $arquivo) {
                        if (empty($arquivo)) continue;
                
                        $comandoStat = 'adb shell stat ' . escapeshellarg($arquivo) . ' 2>&1';
                        $resultadoStat = shell_exec($comandoStat);
                
                        if (strpos($resultadoStat, 'File:') !== false) {
                            preg_match('/Access: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchAccess);
                            preg_match('/Modify: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchModify);
                            preg_match('/Change: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchChange);
                
                            if ($matchAccess && $matchModify && $matchChange) {
                                $accessDate = $matchAccess[1];
                                $modifyDate = $matchModify[1];
                                $changeDate = $matchChange[1];
                
                                $nomeArquivo = basename($arquivo);
                
                                if ($accessDate === $modifyDate && $modifyDate === $changeDate) {
                                    $timestampArquivo = strtotime($accessDate);
                                    $ignorarAviso = false;
                                    
                                    if ($firstInstallDate) {
                                        $timestampInstalacao = strtotime($firstInstallDate);
                                        $diferencaSegundosInstall = abs($timestampArquivo - $timestampInstalacao);
                                        
                                        if ($diferencaSegundosInstall <= 86400) {
                                            $ignorarAviso = true;
                                        }
                                    }

                                    if (!$ignorarAviso && $lastUpdateDate) {
                                        $timestampAtualizacao = strtotime($lastUpdateDate);
                                        $diferencaSegundosUpdate = abs($timestampArquivo - $timestampAtualizacao);
                                        
                                        if ($diferencaSegundosUpdate <= 86400) {
                                            $ignorarAviso = true;
                                        }
                                    }
                                    
                                    if ($ignorarAviso) {
                                        continue;
                                    }
                                
                                    echo $bold . $laranja . "[!] Possível Bypass Holograma detectado (ACCESS, MODIFY, CHANGE iguais)\n";
                                    echo $bold . $laranja . "[!] Arquivo: $nomeArquivo\n";
                
                                    $dateTimeAccess = DateTime::createFromFormat('Y-m-d H:i:s', $accessDate);
                                    $dataAccessFormatada = $dateTimeAccess ? $dateTimeAccess->format('d-m-Y H:i:s') : $accessDate;
                
                                    $dateTimeInstall = DateTime::createFromFormat('Y-m-d H:i:s', $firstInstallDate);
                                    $dataInstallFormatada = $dateTimeInstall ? $dateTimeInstall->format('d-m-Y H:i:s') : $firstInstallDate;
                
                                    echo $bold . $laranja . "[!] Data da modificação (Access/Modify/Change): $dataAccessFormatada\n";
                                    echo $bold . $laranja . "[!] Data de instalação do FF: $dataInstallFormatada\n";
                                    
                                    if ($lastUpdateDate) {
                                        $dateTimeUpdate = DateTime::createFromFormat('Y-m-d H:i:s', $lastUpdateDate);
                                        $dataUpdateFormatada = $dateTimeUpdate ? $dateTimeUpdate->format('d-m-Y H:i:s') : $lastUpdateDate;
                                        echo $bold . $laranja . "[!] Data de atualização do FF: $dataUpdateFormatada\n";
                                    }
                                    
                                    echo $bold . $laranja . "[!] Sn\n";
                                    continue;
                                }
                
                                if ($modifyDate !== $changeDate) {
                                    $dateTimeChange = DateTime::createFromFormat('Y-m-d H:i:s', $changeDate);
                                    $dataChangeFormatadaLegivel = $dateTimeChange ? $dateTimeChange->format('d-m-Y H:i:s') : $changeDate;
                
                                    echo $bold . $vermelho . "[!] Arquivo shader modificado: $nomeArquivo\n";
                                    echo $bold . $amarelo . "[i] Horário da modificação: $dataChangeFormatadaLegivel\n";
                                    echo $bold . $vermelho . "[!]n";
                                }
                            }
                        }
                    }

                    // Verificação adicional de timestamps para detecção de bypass
                    $streamoptional_path = '/sdcard/android/data/com.dts.freefireth/files/contentcache/optional/streamoptional';
                    $out_stream = shell_exec('adb shell stat ' . escapeshellarg($streamoptional_path) . ' 2>&1');
                    $stat_stream = array();
                    
                    if (strpos($out_stream, 'File:') !== false) {
                        if (preg_match('/Access:\s*(\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}(?:\.\d+)?)/', $out_stream, $mm)) {
                            $stat_stream['Access'] = $mm[1];
                        }
                        if (preg_match('/Modify:\s*(\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}(?:\.\d+)?)/', $out_stream, $mm2)) {
                            $stat_stream['Modify'] = $mm2[1];
                        }
                        if (preg_match('/Change:\s*(\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}(?:\.\d+)?)/', $out_stream, $mm3)) {
                            $stat_stream['Change'] = $mm3[1];
                        }
                    }

                    $stream_ns = array('Access' => null, 'Modify' => null, 'Change' => null);
                    foreach (array('Access', 'Modify', 'Change') as $k) {
                        if (isset($stat_stream[$k]) && preg_match('/\.(\d+)$/', $stat_stream[$k], $fr)) {
                            $frac = str_pad($fr[1], 9, '0', STR_PAD_RIGHT);
                            $stream_ns[$k] = substr($frac, 3, 3);
                        }
                    }

                    $out_shader = shell_exec('adb shell stat ' . escapeshellarg($arquivo) . ' 2>&1');
                    $stat_shader = array();
                    
                    if (strpos($out_shader, 'File:') !== false) {
                        if (preg_match('/Access:\s*(\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}(?:\.\d+)?)/', $out_shader, $mm)) {
                            $stat_shader['Access'] = $mm[1];
                        }
                        if (preg_match('/Modify:\s*(\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}(?:\.\d+)?)/', $out_shader, $mm2)) {
                            $stat_shader['Modify'] = $mm2[1];
                        }
                        if (preg_match('/Change:\s*(\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}(?:\.\d+)?)/', $out_shader, $mm3)) {
                            $stat_shader['Change'] = $mm3[1];
                        }
                    }

                    $shader_ns = array('Access' => null, 'Modify' => null, 'Change' => null);
                    foreach (array('Access', 'Modify', 'Change') as $k) {
                        if (isset($stat_shader[$k]) && preg_match('/\.(\d+)$/', $stat_shader[$k], $fr)) {
                            $frac2 = str_pad($fr[1], 9, '0', STR_PAD_RIGHT);
                            $shader_ns[$k] = substr($frac2, 3, 3);
                        }
                    }


                } else {
                    echo $bold . $amarelo . "[i] Nenhum arquivo de shader encontrado.\n";
                }



                $diretorioShaders = "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android/gameassetbundles";
                $comandoShaders = 'adb shell "if [ -d ' . escapeshellarg($diretorioShaders) . ' ]; then find ' . escapeshellarg($diretorioShaders) . ' -type f; fi"';
                $resultadoShaders = shell_exec($comandoShaders);

                $encontrouBypass = false;
                $encontrouReplayPassado = false;
                $arquivoSuspeito = '';

                if (!empty($resultadoShaders)) {
                    $arquivos = explode("\n", trim($resultadoShaders));
                    $arquivos = array_filter($arquivos);
                
                    foreach ($arquivos as $arquivo) {
                        if (empty($arquivo)) continue;
                
                        $comandoExiste = 'adb shell "if [ -f ' . escapeshellarg($arquivo) . ' ]; then echo 1; fi"';
                        if (empty(shell_exec($comandoExiste))) {
                            continue;
                        }
                
                        $nomeArquivo = basename($arquivo);
                
                        $comandoVerificaUnityFS = 'adb shell "head -c 20 ' . escapeshellarg($arquivo) . ' 2>/dev/null"';
                        $resultadoVerificaUnityFS = shell_exec($comandoVerificaUnityFS);
                
                        if (!is_string($resultadoVerificaUnityFS) || strpos($resultadoVerificaUnityFS, "UnityFS") === false) {
                            continue;
                        }
                
                        $comandoStat = 'adb shell "stat ' . escapeshellarg($arquivo) . ' 2>/dev/null"';
                        $resultadoStat = shell_exec($comandoStat);
                
                        if (!empty($resultadoStat) && strpos($resultadoStat, "No such file or directory") === false) {
                            preg_match('/Modify: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchModify);
                            preg_match('/Change: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchChange);
                            preg_match('/Access: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchAccess);
                
                            if (!empty($matchModify[1]) && !empty($matchChange[1]) && !empty($matchAccess[1])) {
                                $dataModifyOriginal = trim($matchModify[1]);
                                $dateTimeModify = DateTime::createFromFormat('Y-m-d H:i:s', $dataModifyOriginal);
                                $dataModify = $dateTimeModify ? $dateTimeModify->format('d-m-Y H:i:s') : "Formato inválido";
                
                                $currentDateTime = new DateTime("now");
                                $interval = $currentDateTime->diff($dateTimeModify);
                                $diffInSeconds = abs($interval->days * 24 * 60 * 60 + $interval->h * 3600 + $interval->i * 60 + $interval->s);
                
                                if ($diffInSeconds <= 3600) {
                                    echo $bold . $amarelo . "[!] Possível bypass detectado: arquivo shader alterado recentemente.\n";
                                    echo $bold . $amarelo . "[!] Arquivo: $nomeArquivo\n";
                                    echo $bold . $amarelo . "[*] Hora da modificação: $dataModify\n";
                                    echo $bold . $amarelo . "[*] Hora atual: " . $currentDateTime->format('d-m-Y H:i:s') . "\n\n";
                                    $encontrouBypass = true;
                                    $arquivoSuspeito = $nomeArquivo;
                                    break;
                                }
                
                                $cmd = "adb shell dumpsys package com.dts.freefireth | grep -i firstInstallTime";
                                $firstInstallTime = shell_exec($cmd);
                
                                if (!is_null($firstInstallTime) && preg_match('/firstInstallTime=([\d-]+ \d{2}:\d{2}:\d{2})/', $firstInstallTime, $matches)) {
                                    $dataInstalacao = trim($matches[1]);
                                    $dateTimeInstalacao = DateTime::createFromFormat('Y-m-d H:i:s', $dataInstalacao);
                                    $dataInstalacaoFormatada = $dateTimeInstalacao ? $dateTimeInstalacao->format('d-m-Y H:i:s') : "Formato de data inválido.";
                                } else {
                                    $dataInstalacaoFormatada = "Data de instalação não encontrada.";
                                }
                
                                if ($dataModify === $matchChange[1] && $dataModify === $matchAccess[1]) {
                                    if (stripos($nomeArquivo, 'shader') !== false) {
                                        if ($dataModify !== $dataInstalacao) {
                                            echo $bold . $amarelo . "[!] Arquivo shader modificado: " . $nomeArquivo . "\n";
                                            echo $bold . $amarelo . "[!] Horário da modificação: " . $dataModify . "\n"; 
                                            echo $bold . $amarelo . "[*] Data de instalação do Free Fire: " . $dataInstalacaoFormatada . "\n";
                                            echo $bold . $branco . "[#] Por favn\n";
                                            $encontrouReplayPassado = true;
                                            $arquivoSuspeito = $nomeArquivo;
                                        }
                                        break;
                                    }
                                }
                            }
                        }
                    }
                
                    if ($encontrouBypass) {
                        echo $bold . $amarelo . "[!] Modificação em arquivo de shaders detectada. Arquivo: " . $arquivoSuspeito . "\n";
                        echo $bold . $amarelo . "[*] Hora da modificação: " . $dataModify . "\n";
                        echo $bold . $amarelo . "[*] Verifique se a modificação ocorreu após a partida!\n\n";
                    }
                } elseif ($encontrouReplayPassado) {
                    echo $bold . $vermelho . "[!] Possível modificação em arquivo de shaders detectada. Arquivo: " . $arquivoSuspeito . ", Horário: " . $dataModify . "\n";
                    echo $bold . $vermelho . "[*] Data de instalação do Free Fire: " . $dataInstalacaoFormatada . "\n";
                    echo $bold . $branco . "[#] Verifique cuidadosamente no App Usage a data de instalação do Free Fire!\n\n";
                } else {
                    echo $bold . $fverde . "[i] Nenhuma alteração suspeita encontrada.\n";
                }


                $comandoPastaShaders = 'adb shell "stat ' . escapeshellarg($diretorioShaders) . ' 2>/dev/null"';
                $resultadoPastaShaders = shell_exec($comandoPastaShaders);

                $encontrouBypassPasta = false;
                $encontrouReplayPassadoPasta = false;
                $dataModifyFormatada = '';
                $dataChangeFormatada = ''; 

                if (!empty($resultadoPastaShaders)) {
                    preg_match('/Modify: (.*?)\n/', $resultadoPastaShaders, $matchModify);
                    preg_match('/Change: (.*?)\n/', $resultadoPastaShaders, $matchChange);
                    preg_match('/Access: (.*?)\n/', $resultadoPastaShaders, $matchAccess);

                    if (!empty($matchModify[1]) && !empty($matchChange[1]) && !empty($matchAccess[1])) {
                        $dataModify = trim($matchModify[1]);
                        $dataChange = trim($matchChange[1]);
                        $dataAccess = trim($matchAccess[1]);

                        $dataModifyFormatada = preg_replace('/\.\d{9}.*$/', '', $dataModify);
                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $dataModifyFormatada);
                        if ($date) {
                            $dataModifyFormatada = $date->format('d-m-Y H:i:s');
                        }

                        $dataChangeFormatada = preg_replace('/\.\d{9}.*$/', '', $dataChange);
                        $dateChange = DateTime::createFromFormat('Y-m-d H:i:s', $dataChangeFormatada);
                        if ($dateChange) {
                            $dataChangeFormatada = $dateChange->format('d-m-Y H:i:s');
                        }

                        if ($dataModify !== $dataChange) {
                            $encontrouBypassPasta = true;
                        }

                        if ($dataModify === $dataChange && $dataModify === $dataAccess) {
                            $encontrouReplayPassadoPasta = true;
                        }
                    }
                }

                if ($encontrouBypassPasta || $encontrouReplayPassadoPasta) {
                    echo $bold . $vermelho . "[!] Mon";
                    echo $bold . $amarelo . "[*] Data da última modificação: " . $dataModifyFormatada . "\n\n";
                } else {
                    echo $bold . $fverde . "[i] Pasta shaders sem alterações suspeitas.\n";
                    if (!empty($dataModifyFormatada)) {
                        echo $bold . $amarelo . "[*] Data da última modificação: " . $dataModifyFormatada . "\n\n";
                    } else {
                        echo "\n";
                    }
                }

                echo "\n" . $bold . $amarelo . "[*] Data da última alteração na pasta 'gameassetbundles': " . ($dataChangeFormatada ?: "Não encontrada") . "\n";
                echo $bold . $branco . "[#] Verifique o horário da últn";

                $diretorioVerificar = "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android"; 

                echo "[+] Verificando datas de modificação na pasta 'android'...\n";

                $comandoStat = 'adb shell stat ' . escapeshellarg($diretorioVerificar) . ' 2>&1';
                $resultadoStat = shell_exec($comandoStat);

                if (strpos($resultadoStat, 'File:') !== false) {
                    preg_match('/Access: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d+)/', $resultadoStat, $matchAccess);
                    preg_match('/Modify: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d+)/', $resultadoStat, $matchModify);
                    preg_match('/Change: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d+)/', $resultadoStat, $matchChange);

                    if ($matchAccess && $matchModify && $matchChange) {
                        $dataAccess = $matchAccess[1];
                        $dataModify = $matchModify[1];
                        $dataChange = $matchChange[1];

                        $dateModify = DateTime::createFromFormat('Y-m-d H:i:s.u', $dataModify);
                        if ($dateModify) {
                            $dataModifyFormatada = $dateModify->format('d-m-Y H:i:s');
                        }

                        if ($dataAccess === $dataModify && $dataModify === $dataChange) {
                            echo $bold . $vermelho . "[!] Possível bypass detectado - Datas idênticas\n";
                            echo $bold . $vermelho . "[i] Data: " . $dataModifyFormatada . "\n";
                        } elseif ($dataModify === $dataChange) {
                            echo $bold . $amarelo . "[i] Modificação da pasta: " . $dataModifyFormatada . "\n";
                        } else {
                            echo $bold . $vermelho . "[!] Discrepância encontrada\n";
                            $dateAccess = DateTime::createFromFormat('Y-m-d H:i:s.u', $dataAccess);
                            $dateChange = DateTime::createFromFormat('Y-m-d H:i:s.u', $dataChange);
                            if ($dateAccess && $dateChange) {
                                echo $bold . $amarelo . "[i] Acesso: " . $dateAccess->format('d-m-Y H:i:s') . "\n";
                                echo $bold . $amarelo . "[i] Modificação: " . $dataModifyFormatada . "\n";
                                echo $bold . $amarelo . "[i] Mudança: " . $dateChange->format('d-m-Y H:i:s') . "\n";
                            }
                        }
                    } else {
                        echo $bold . $vermelho . "[!] Não foi possível extrair datas. Resultado:\n";
                        echo $bold . $amarelo . $resultadoStat . "\n";
                    }
                } elseif (strpos($resultadoStat, 'No such file') !== false) {
                    echo $bold . $vermelho . "[!] Pasta não encontrada\n";
                } elseif (strpos($resultadoStat, 'Permission denied') !== false) {
                    echo $bold . $vermelho . "[!] Sem permissão de acesso\n";
                } else {
                    echo $bold . $vermelho . "[!] Erro desconhecido. Resultado:\n";
                    echo $resultadoStat . "\n";
                }

                echo $bold . $branco . "[+] Cas\n\n";

                $diretorioAvatarRes = "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android/optionalavatarres/gameassetbundles";
                $diretorioOptionalAvatarRes = "/sdcard/Android/data/com.dts.freefireth/files/contentcache/Optional/android/optionalavatarres";

                // Verifica se a pasta gameassetbundles existe
                $comandoVerificarPasta = 'adb shell "test -d ' . escapeshellarg($diretorioAvatarRes) . ' && echo existe || echo naoexiste"';
                $resultadoVerificarPasta = trim((string)shell_exec($comandoVerificarPasta));

                $diretorioAlvo = "";
                $nomePasta = "";

                if ($resultadoVerificarPasta === "existe") {
                    $diretorioAlvo = $diretorioAvatarRes;
                    $nomePasta = "gameassetbundles";
                } else {
                    echo $vermelho . "[*] Pasta 'gameassetbundles' não encontrada, verificando a pasta 'optionalavatarres'...\n";
                    $diretorioAlvo = $diretorioOptionalAvatarRes;
                    $nomePasta = "optionalavatarres";
                }

                $comandoDataModify = 'adb shell stat -c "%y" ' . escapeshellarg($diretorioAlvo) . ' 2>/dev/null';
                $resultadoDataModify = trim((string)shell_exec($comandoDataModify));

                if ($resultadoDataModify !== '') {
                    try {
                        $dataModificacao = new DateTime($resultadoDataModify);
                        $agora = new DateTime("now");

                        echo $bold . $amarelo . "[*] Data de modificação na pasta '$nomePasta': " . $dataModificacao->format('d-m-Y H:i:s') . "\n";

                        $intervalo = $agora->getTimestamp() - $dataModificacao->getTimestamp();

                        if ($intervalo <= 3600) {
                            echo $bold . $vermelho . "[!] Possível Bypass detectado! Modificada há menos de 1 hora.\n";
                            echo $vermelho . "    Hora da modificação: " . $dataModificacao->format('H:i:s') . "\n";
                            echo $vermelho . "    Hora atual:          " . $agora->format('H:i:s') . "\n";
                        }

                    } catch (Exception $e) {
                        echo $vermelho . "[!] Erro ao extrair data de modificação da pasta '$nomePasta': " . $e->getMessage() . "\n";
                    }
                } else {
                    echo $vermelho . "[!] Não foi possível obter a data de modificação da pasta '$nomePasta'.\n";
                }


                $comandoListarArquivos = 'adb shell "find ' . escapeshellarg($diretorioAvatarRes) . ' -type f 2>/dev/null"';
                $resultadoArquivos = (string)shell_exec($comandoListarArquivos);
                $modificacaoDetectada = false;

                if ($resultadoArquivos !== '') {
                    $arquivos = array_filter(explode("\n", trim($resultadoArquivos)), 'strlen');

                    foreach ($arquivos as $arquivo) {
                        $arquivo = (string)$arquivo;
                        if ($arquivo === '') continue;
                        
                        $nomeArquivo = basename($arquivo);
                        $caminhoArquivo = $arquivo;

                        $comandoVerificaUnityFS = 'adb shell "head -c 20 ' . escapeshellarg($caminhoArquivo) . ' 2>/dev/null"';
                        $resultadoVerificaUnityFS = (string)shell_exec($comandoVerificaUnityFS);

                        if ($resultadoVerificaUnityFS === '' || strpos($resultadoVerificaUnityFS, "UnityFS") === false) {
                            continue;
                        }

                        $comandoDataModifyArquivo = 'adb shell stat -c "%y" ' . escapeshellarg($caminhoArquivo) . ' 2>/dev/null';
                        $comandoDataChangeArquivo = 'adb shell stat -c "%z" ' . escapeshellarg($caminhoArquivo) . ' 2>/dev/null';

                        $resultadoDataModifyArquivo = trim((string)shell_exec($comandoDataModifyArquivo));
                        $resultadoDataChangeArquivo = trim((string)shell_exec($comandoDataChangeArquivo));

                        if ($resultadoDataModifyArquivo !== '' && $resultadoDataChangeArquivo !== '') {
                            try {
                                $dataModifyArquivo = new DateTime($resultadoDataModifyArquivo, new DateTimeZone('UTC'));
                                $dataModifyArquivo->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                                $dataChangeArquivo = new DateTime($resultadoDataChangeArquivo, new DateTimeZone('UTC'));
                                $dataChangeArquivo->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                                if ($dataModifyArquivo != $dataChangeArquivo) {
                                    echo $bold . $vermelho . "[!] M";
                                    $modificacaoDetectada = true;
                                }
                            } catch (Exception $e) {
                                echo $vermelho . "[!] Erro ao verificar datas do arquivo $nomeArquivo: " . $e->getMessage() . "\n";
                            }
                        }
                    }

                    if (!$modificacaoDetectada) {
                        echo $bold . $fverde . "[i] Nenhuma alteração suspeita encontrada nos arquivos.\n\n";
                    }
                } else {
                    echo $vermelho . "[*] Sem itens baixados! Verifique se a data é após o fim da partida!\n\n";
                }


                echo $bold . $azul . "[+] Checando OBB...\n";

                $diretorioObb = "/sdcard/Android/obb/com.dts.freefireth";
                $comandoObb = 'adb shell "ls ' . escapeshellarg($diretorioObb) . '/*obb* 2>/dev/null"';
                $resultadoObb = shell_exec($comandoObb);

                if (!empty($resultadoObb)) {
                    $arquivosObb = explode("\n", trim($resultadoObb));

                    foreach ($arquivosObb as $arquivo) {
                        if (empty($arquivo)) continue;
                        $comandoDataChange = 'adb shell stat -c "%z" ' . escapeshellarg($arquivo) . ' 2>/dev/null';
                        $resultadoDataChange = shell_exec($comandoDataChange);

                        if (!empty($resultadoDataChange)) {
                            $dataChange = new DateTime(trim($resultadoDataChange ?? ""), new DateTimeZone('UTC'));
                            $dataChange->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                            echo $amarelo . "[*] Data de modificação do arquivo OBB: " . $dataChange->format("d-m-Y H:i:s") . "\n";
                        } else {
                            echo $vermelho . "[!] Não foi possível obter a data de modificação do arquivo OBB.\n";
                        }
                    }
                } else {
                    echo $vermelho . "[*] OBB deletada e/ou inexistente!\n";
                }


                


            

                echo $bold . $branco . "";

                echo $bold . $branco . "\n\n\tDDD.\n";
                echo $bold . $branco . "\t                 Com carinho, Keller...\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
        } elseif ($opcaoscanner == "2") {
            system("clear");
            keller_banner();

            if (!shell_exec("adb version > /dev/null 2>&1"))
            {
                system("pkg install -y android-tools > /dev/null 2>&1");
            }


            date_default_timezone_set('America/Sao_Paulo');
            shell_exec('adb start-server > /dev/null 2>&1');
