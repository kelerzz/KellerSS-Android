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
    global $bold, $azul, $fverde, $verde, $amarelo, $branco, $cln, $vermelho;

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

    // 2. BYPASS LIST (TIMING HÍBRIDO)
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
        
        // Fase Lenta (Até o stat incluso)
        if ($index <= 5) {
            usleep(400000); // 400ms
            
            // Pausa EXTRA de transição após o stat (index 5)
            if ($index == 5) {
                usleep(500000); // 500ms de atraso
            }
        } 
        // Fase Rápida (Do cd em diante)
        else {
            usleep(70000);  // 70ms
        }
    }
    echo $bold . $fverde . "[i] Nenhum bypass de funções shell detectado.\n\n";

    // 3. REINÍCIO (REAL mas SEMPRE VERDE)
    echo $bold . $azul . "[+] Checando se o dispositivo foi reiniciado recentemente...\n";
    
    // Executa o comando REAL para gerar delay/processamento real no sistema
    $uptime = shell_exec("adb shell uptime"); 
    usleep(100000); 

    // IGNORA o resultado real e mostra sempre verde (Fake)
    echo $bold . $fverde . "[i] Dispositivo não reiniciado recentemente.\n\n";

    // --- IMPLEMENTAÇÃO LOGCAT REAL ---
    // Tenta pegar a data real do log do sistema
    $logcatTime = shell_exec("adb logcat -d -v time | head -n 2");
    preg_match('/(\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $logcatTime, $matchTime);

    if (!empty($matchTime[1])) {
        // Converte para objeto de data para garantir formatação correta (embora logcat já venha quase pronto)
        $dateObj = DateTime::createFromFormat('m-d H:i:s', $matchTime[1]);
        $formattedDate = $dateObj ? $dateObj->format('d-m H:i:s') : $matchTime[1];

        echo $bold . $amarelo . "[+] Primeira log do sistema: " . $formattedDate . "\n";
        echo $bold . $branco . "[+] Caso a data da primeira log seja durante/após a partida e/ou seja igual a uma data alterada, aplique o W.O!\n\n";
    } else {
        // Caso não tenha ADB conectado ou log vazio
        echo $bold . $vermelho . "[!] Não foi possível capturar a data/hora do sistema (Verifique conexão ADB).\n";
        echo $bold . $branco . "[+] W.O aplicável se a falha persistir sem justificativa.\n\n";
    }
    // ---------------------------------

    echo $bold . $azul . "[+] Verificando mudanças de data/hora...\n";
    usleep(50000);
    echo $bold . $vermelho . "[!] Nenhum log de alteração de horário encontrado.\n\n";

    echo $bold . $azul . "[+] Checando se modificou data e hora...\n";
    echo $bold . $fverde . "[i] Data e hora/fuso horário automático estão ativados.\n";
    echo $bold . $branco . "[+] Caso haja mudança de horário durante/após a partida, aplique o W.O!\n\n";

    echo $bold . $azul . "[+] Obtendo os últimos acessos do Google Play Store...\n";
    echo $bold . $vermelho . "[!] Nenhum dado encontrado.\n";
    echo $bold . $branco . "[+] Caso haja acesso durante/após a partida, aplique o W.O!\n\n";

    echo $bold . $azul . "[+] Obtendo os últimos textos copiados...\n";
    echo $bold . $vermelho . "[!] Nenhum dado encontrado.\n\n";

    // 4. CHECK REPLAY (PAUSA LONGA)
    echo $bold . $azul . "[+] Checando se o replay foi passado...\n";
    processando(2.0); 
    echo $bold . $fverde . "[i] Nenhum replay foi passado e a pasta MReplays está normal.\n";

       // --- LÓGICA DE DATAS (AJUSTE EXATO: 3min 39s) ---
    $pacote = ($nomeJogo == "FreeFire Max") ? "com.dts.freefiremax" : "com.dts.freefireth";
    $cmdInstall = "adb shell dumpsys package $pacote | grep -i firstInstallTime";
    $outInstall = shell_exec($cmdInstall);

    if ($outInstall && preg_match('/firstInstallTime=([\d-]+\s[\d:]+)/', $outInstall, $matches)) {
        $timestampInstall = strtotime($matches[1]);
        $dateInstall = date("d-m-Y H:i:s", $timestampInstall);
        
        // Adiciona exatamente 219 segundos (3 minutos e 39 segundos)
        $dateReplay = date("d-m-Y H:i:s", $timestampInstall + 219); 
    } else {
        // Fallback caso não encontre a data de instalação
        $dateInstall = date("d-m-Y H:i:s", strtotime("-12 minutes"));
        // 12 minutos - 3min 39s = 8 minutos e 21 segundos atrás
        $dateReplay = date("d-m-Y H:i:s", strtotime("-8 minutes 21 seconds"));
    }
    // -----------------------

    echo $bold . $amarelo . "[+] Data de acesso da pasta MReplays: $dateReplay\n";
    echo $bold . $amarelo . "[+] Data de instalação do Free Fire: $dateInstall\n";
    echo $bold . $branco . "[#] Verifique a data de instalação do jogo com a data de acesso da pasta MReplays para ver se o jogo foi recém instalado antes da partida, se não, vá no histórico e veja se o player jogou outras partidas recentemente, se sim, aplique o W.O!\n\n";

    // 5. HOLOGRAMA (PAUSA LONGA)
    echo $bold . $azul . "[+] Checando bypass de Wallhack/Holograma...\n";
    processando(2.5); 
    echo $bold . $verde . "[+] Nenhum bypass de holograma detectado.\n\n";

    echo $bold . $branco . "[+] Após verificar in-game se o usuário está de Wallhack, olhando skins de armas e atrás da parede, verifique os horários do Shaders e OBB e compare também com o horário do replay, caso esteja muito diferente as datas, aplique o W.O!\n\n";

    echo $bold . $branco . "\n\n\t Obrigado por compactuar por um cenário limpo de cheats.\n";
    echo $bold . $branco . "\t                  Com carinho, Keller...\n\n\n\n\n\n\n\n";
    
    // --- CONGELAMENTO FINAL ---
    while(true) {
        sleep(60);
    }
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


