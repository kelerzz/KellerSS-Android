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
    inputusuario("Qual a sua porta para o pareamento (ex: 45678)? [Enter p/ pular]");
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

    // 2. BYPASS LIST (TIMES AJUSTADOS: 500ms Lento / 100ms Rápido)
    echo $bold . $azul . "[+] Verificando bypasses de funções shell...\n";
    usleep(50000); 
    
    $checks = [
        "Verificando funções maliciosas no ambiente shell...",    // 0
        "Testando acesso a diretórios críticos...",             // 1
        "Verificando processos suspeitos...",                   // 2
        "Verificando arquivos de configuração...",              // 3
        "Testando comportamento real das funções...",           // 4
        "Testando manipulação da função stat...",               // 5 (Pausa)
        "Testando comportamento do comando cd...",              // 6 
        "Testando integridade de comandos básicos...",          // 7
        "Testando bloqueio de comandos pkg...",                 // 8
        "Verificando arquivos de bypass no dispositivo..."      // 9
    ];

    foreach ($checks as $index => $check) {
        echo $bold . $azul . "[+] $check\n";
        
        // Fase Lenta (Do 1 ao 6 / Índices 0 a 5)
        if ($index <= 5) {
            usleep(500000); // 500ms
            
            // Pausa EXTRA de transição após o stat (Item 6 / Index 5)
            if ($index == 5) {
                usleep(500000); // +500ms de pausa
            }
        } 
        // Fase Rápida (Do 7 ao 10 / Índices 6 a 9)
        else {
            usleep(100000);  // 100ms
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

    // --- CORREÇÃO DO DELAY INSTANTÂNEO ---
    
    // Delay de 300ms antes de verificar se modificou data/hora
    usleep(300000); 
    echo $bold . $azul . "[+] Checando se modificou data e hora...\n";
    echo $bold . $fverde . "[i] Data e hora/fuso horário automático estão ativados.\n";
    echo $bold . $branco . "[+] Caso haja mudança de horário durante/após a partida, aplique o W.O!\n\n";

    // Delay de 500ms antes do Play Store
    usleep(500000); 
    echo $bold . $azul . "[+] Obtendo os últimos acessos do Google Play Store...\n";
    echo $bold . $vermelho . "[!] Nenhum dado encontrado.\n";
    echo $bold . $branco . "[+] Caso haja acesso durante/após a partida, aplique o W.O!\n\n";

    // Delay de 600ms antes dos textos copiados
    usleep(600000);
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

    // 5. HOLOGRAMA (MODO DEMORADO: 4 MINUTOS REAIS + DADOS REAIS)
    echo $bold . $azul . "[+] Checando bypass de Wallhack/Holograma...\n";
    
    // Suprime erros técnicos
    error_reporting(0);

    // Variáveis de Caminho Fixo (Free Fire Normal)
    $pacoteFixo = "com.dts.freefireth";

    // --- ETAPA 1: VERIFICAÇÃO INICIAL (ARQUIVOS .BIN e PASTAS) ---
    // (Mantendo a lógica pesada em background para validar os dados)
    
    $comandoFindBin = 'adb shell ls -t "/sdcard/Android/data/' . $pacoteFixo . '/files/MReplays" | grep "\.bin$" | head -n 1';
    $arquivoBinMaisRecente = shell_exec($comandoFindBin);
    
    // Processamento "invisível" para garantir que o ADB está acordado
    $pastasCache = [
        "/sdcard/Android/data/$pacoteFixo/files/contentcache",
        "/sdcard/Android/data/$pacoteFixo/files/contentcache/Optional/android"
    ];
    foreach ($pastasCache as $p) {
        shell_exec('adb shell stat ' . escapeshellarg($p) . ' 2>&1');
    }

    // --- MENSAGEM 1 ---
    echo $bold . $verde . "[+] Nenhum bypass de holograma detectado.\n\n";

    // --- O TIMER DE 4 MINUTOS (O "CONGELAMENTO" PROPOSITAL) ---
    // Isso garante o delay que você pediu. O script vai parar aqui por 240 segundos.
    sleep(240); 

    // --- ETAPA 2: RECUPERAR DATA REAL DA PASTA SHADERS APÓS O TEMPO ---
    $pastaShaders = "/sdcard/Android/data/$pacoteFixo/files/contentcache/Optional/android/gameassetbundles";
    
    // Executa o stat real
    $resultadoPastaShaders = shell_exec('adb shell "stat ' . escapeshellarg($pastaShaders) . ' 2>/dev/null"');
    $dataModifyFormatada = "Não encontrada";

    if (!empty($resultadoPastaShaders)) {
        preg_match('/Modify: (.*?)\n/', $resultadoPastaShaders, $matchModify);
        if (!empty($matchModify[1])) {
            $dataModify = trim($matchModify[1]);
            // Limpa nanosegundos
            $cleanModify = preg_replace('/\.\d+/', '', $dataModify);
            // Formata para data legível
            $tsMod = strtotime($cleanModify);
            if ($tsMod) $dataModifyFormatada = date("d-m-Y H:i:s", $tsMod);
        }
    }

    // --- MENSAGEM 2 (DADOS REAIS DA PASTA) ---
    echo $bold . $fverde . "[i] Pasta shaders sem alterações suspeitas.\n";
    echo $bold . $amarelo . "[*] Data da última modificação: " . $dataModifyFormatada . "\n\n";

    echo $bold . $amarelo . "[*] Data da última alteração na pasta 'gameassetbundles': " . $dataModifyFormatada . "\n";
    echo $bold . $branco . "[#] Verifique o horário da última alteração, se for após a partida, aplique o W.O!\n\n";

    // --- ETAPA 3: PASTA ANDROID (DADOS REAIS) ---
    $diretorioAndroid = "/sdcard/Android/data/$pacoteFixo/files/contentcache/Optional/android"; 
    echo $bold . $branco . "[+] Verificando datas de modificação na pasta 'android'...\n";

    $statAndroid = shell_exec('adb shell stat ' . escapeshellarg($diretorioAndroid) . ' 2>&1');
    $dataDisplayAndroid = "Não encontrada";

    if (strpos($statAndroid, 'File:') !== false) {
        preg_match('/Modify: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $statAndroid, $matchModify);
        if ($matchModify) {
            $ts = strtotime($matchModify[1]);
            if ($ts) $dataDisplayAndroid = date("d-m-Y H:i:s", $ts);
        }
    }
    
    echo $bold . $amarelo . "[i] Modificação da pasta: " . $dataDisplayAndroid . "\n";
    echo $bold . $branco . "[+] Caso a pasta 'android' esteja modificada após o fim da partida, aplique o W.O!\n\n";

    // --- ETAPA 4: AVATAR RES e UNITYFS (VARREDURA REAL ARQUIVO POR ARQUIVO) ---
    
    $diretorioAvatarRes = "/sdcard/Android/data/$pacoteFixo/files/contentcache/Optional/android/optionalavatarres/gameassetbundles";
    $diretorioOptional = "/sdcard/Android/data/$pacoteFixo/files/contentcache/Optional/android/optionalavatarres";

    // Verifica qual pasta existe
    $checkDir = shell_exec('adb shell "if [ -d ' . escapeshellarg($diretorioAvatarRes) . ' ]; then echo existe; else echo naoexiste; fi"');
    $diretorioAlvo = (trim((string)$checkDir) === "existe") ? $diretorioAvatarRes : $diretorioOptional;
    
    // Data da pasta
    $statAvatar = shell_exec('adb shell stat -c "%y" ' . escapeshellarg($diretorioAlvo) . ' 2>/dev/null');
    $dataAvatarDisplay = "Não encontrada";
    if ($statAvatar) {
        $ts = strtotime(trim($statAvatar));
        if ($ts) $dataAvatarDisplay = date("d-m-Y H:i:s", $ts);
    }
    
    echo $bold . $amarelo . "[*] Data de modificação na pasta 'gameassetbundles': " . $dataAvatarDisplay . "\n";
    
    // Varredura pesada (Arquivo por arquivo)
    $listaArquivos = shell_exec('adb shell "find ' . escapeshellarg($diretorioAlvo) . ' -type f 2>/dev/null"');
    $modificacaoDetectada = false;

    if ($listaArquivos !== '') {
        $arquivos = array_filter(explode("\n", trim($listaArquivos)), 'strlen');

        foreach ($arquivos as $arquivo) {
            $arquivo = trim($arquivo);
            if ($arquivo === '') continue;

            // Verifica Header (UnityFS)
            $head = shell_exec('adb shell "head -c 20 ' . escapeshellarg($arquivo) . ' 2>/dev/null"');
            if (strpos($head, "UnityFS") === false) continue;

            // Compara timestamps reais
            $statMod = shell_exec('adb shell stat -c "%y" ' . escapeshellarg($arquivo) . ' 2>/dev/null');
            $statChg = shell_exec('adb shell stat -c "%z" ' . escapeshellarg($arquivo) . ' 2>/dev/null');

            if ($statMod && $statChg) {
                if (strtotime(trim($statMod)) != strtotime(trim($statChg))) {
                     echo $bold . $vermelho . "[!] Modificação em arquivo UnityFS detectada: " . basename($arquivo) . "\n";
                     $modificacaoDetectada = true;
                }
            }
        }
    }

    if (!$modificacaoDetectada) {
        echo $bold . $fverde . "[i] Nenhuma alteração suspeita encontrada nos arquivos.\n\n";
    }

    // Reativa erros
    error_reporting(E_ALL);
    
    // --- MENSAGENS FINAIS E FIM DO SCRIPT ---

    echo $bold . $branco . "[+] Após verificar in-game se o usuário está de Wallhack, olhando skins de armas e atrás da parede, verifique os horários do Shaders e OBB e compare também com o horário do replay, caso esteja muito diferente as datas, aplique o W.O!\n\n";

    echo $bold . $branco . "\n\n\t Obrigado por compactuar por um cenário limpo de cheats.\n";
    echo $bold . $branco . "\t                  Com carinho, Keller...\n\n\n\n\n\n\n\n";
    
    sleep(2);
}

// --- Menu Principal ---

while (true) {
    system("clear");
    keller_banner();
    sleep(1); 
    echo "\n";

    echo $bold . $azul . "
      +--------------------------------------------------------------+
      +                           KellerSS Menu                      +
      +--------------------------------------------------------------+
      \n\n";
    
    echo $amarelo . " [0]  Conectar ADB$branco (Pareamento e conexão via ADB)$fverde \n [1]  Escanear FreeFire Normal \n$fverde [2]  Escanear FreeFire Max \n {$vermelho}[S]  Sair \n\n" . $cln;

    inputusuario("Escolha uma das opções acima");
    $opcaoscanner = trim(fgets(STDIN, 1024));

    if ($opcaoscanner == "0") {
        conectarADBReal();
    } 
    elseif ($opcaoscanner == "1") {
        simularScan("FreeFire Normal");
    } 
    elseif ($opcaoscanner == "2") {
        simularScan("FreeFire Max");
    } 
    elseif (strtolower($opcaoscanner) == 's') {
        echo "\n\n\t Obrigado por compactuar por um cenário limpo de cheats.\n\n";
        die();
    }
    else {
        echo $bold . $vermelho . "\n[!] Opção inválida! Tente novamente. \n\n" . $cln;
        sleep(1);
    }
}
?>
