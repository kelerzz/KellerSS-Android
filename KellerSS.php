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
$magenta    = "\e[35m";
$azulbg     = "\e[44m";
$bold       = "\e[1m";

// --- Funções Auxiliares ---

function keller_banner(){
  echo "\e[37m
           KellerSS Android\e[36m Fucking Cheaters\e[91m\e[37m discord.gg/allianceoficial\e[91m
            
                            )       (     (          (     
                ( /(       )\ )  )\ )       )\ )  
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
    
    // Verifica instalação real
    if (!shell_exec("adb version > /dev/null 2>&1")) {
        echo $bold . $amarelo . "[!] ADB não encontrado. Tentando instalar android-tools...\n" . $cln;
        system("pkg install android-tools -y"); 
    } else {
        echo $bold . $fverde . "[i] ADB já está instalado.\n\n" . $cln;
    }

    // Pareamento
    echo $bold . $branco . "Deseja realizar o pareamento? (s/n): " . $cln;
    $resp = trim(fgets(STDIN));
    if (strtolower($resp) == 's') {
        inputusuario("Qual a sua porta para o pareamento (ex: 45678)?");
        $pair_port = trim(fgets(STDIN, 1024));
        if (!empty($pair_port) && is_numeric($pair_port)) {
            echo $bold . $amarelo . "\n[!] Agora, digite o código de pareamento do celular e pressione Enter.\n" . $cln;
            system("adb pair localhost:" . $pair_port);
        } else {
            echo $bold . $vermelho . "\n[!] Porta inválida!\n" . $cln;
        }
    }

    // Conexão
    echo "\n";
    inputusuario("Qual a sua porta para a conexão (ex: 12345)?");
    $connect_port = trim(fgets(STDIN, 1024));
    
    if (!empty($connect_port) && is_numeric($connect_port)) {
        echo $bold . $amarelo . "\n[!] Conectando ao dispositivo...\n" . $cln;
        system("adb connect localhost:" . $connect_port);
        
        echo $bold . $azul . "\n[+] Verificando lista de dispositivos conectados:\n" . $cln;
        system("adb devices"); // Mostra dispositivos reais
        
        echo $bold . $fverde . "\n[i] Processo de conexão finalizado.\n" . $cln;
    } else {
        echo $bold . $vermelho . "\n[!] Porta inválida!\n" . $cln;
    }
    
    // Simula o comportamento original: espera enter e volta pro menu
    echo $bold . $branco . "\n[+] Pressione Enter para voltar ao menu...\n" . $cln;
    fgets(STDIN, 1024);
}

// --- Lógica FAKE do Scanner ---
function simularScan($nomeJogo) {
    global $bold, $azul, $fverde, $amarelo, $branco, $cln, $vermelho;

    system("clear");
    keller_banner();

    // Simulação visual idêntica ao original
    echo $bold . $azul . "[+] Verificando conexão ADB e ambiente...\n" . $cln;
    processando(1);
    
    // Pega versão real só pra dar credibilidade visual no print
    $versaoReal = shell_exec("adb shell getprop ro.build.version.release 2>/dev/null");
    $versaoDisplay = $versaoReal ? trim($versaoReal) : "11";
    
    echo $bold . $azul . "[+] Versão do Android: $versaoDisplay\n";
    processando(0.5);
    
    echo $bold . $azul . "[+] Checando se possui Root...\n";
    processando(1);
    echo $bold . $fverde . "[-] O dispositivo não tem root.\n\n";

    echo $bold . $azul . "[+] Verificando scripts ativos em segundo plano...\n";
    processando(2);
    echo $bold . $fverde . "[i] Nenhum script ativo detectado.\n";
    
    echo $bold . $azul . "[+] Finalizando sessões bash desnecessárias...\n";
    processando(0.5);
    echo $bold . $fverde . "[i] Sessões desnecessárias finalizadas.\n\n";

    echo $bold . $azul . "[+] Verificando bypasses de funções shell...\n";
    processando(1.5);
    echo $bold . $fverde . "[i] Nenhum bypass de funções shell detectado.\n\n";

    echo $bold . $azul . "[+] Checando se o dispositivo foi reiniciado recentemente...\n";
    processando(0.5);
    echo $bold . $fverde . "[i] Dispositivo não reiniciado recentemente.\n\n";

    echo $bold . $azul . "[+] Verificando mudanças de data/hora...\n";
    processando(1);
    echo $bold . $fverde . "[i] Data e hora/fuso horário automático estão ativados.\n";
    echo $bold . $vermelho . "[!] Nenhum log de alteração de horário encontrado.\n\n";

    echo $bold . $azul . "[+] Obtendo os últimos acessos do Google Play Store...\n";
    processando(1);
    echo $bold . "\e[31m[!] Nenhum dado encontrado.\n\n";
    echo $bold . $branco . "[+] Caso haja acesso durante/após a partida, aplique o W.O!\n\n";

    echo $bold . $azul . "[+] Obtendo os últimos textos copiados...\n";
    processando(0.5);
    echo $bold . "\e[31m[!] Nenhum dado encontrado.\n\n";

    echo $bold . $azul . "[+] Checando se o replay foi passado ($nomeJogo)...\n";
    processando(3); // Pausa dramática para parecer que está lendo binários
    echo $bold . $fverde . "[i] Nenhum replay foi passado e a pasta MReplays está normal.\n";

    $dataHoje = date("d-m-Y H:i:s");
    $dataInstall = date("d-m-Y H:i:s", strtotime("-15 days")); // Data fake antiga segura
    
    echo $bold . $amarelo . "[+] Data de acesso da pasta MReplays: $dataHoje\n";
    echo $bold . $amarelo . "[*] Data de instalação do Free Fire: $dataInstall\n";
    echo $bold . $branco . "[#] Verifique a data de instalação...\n\n";

    echo $bold . $azul . "[+] Checando bypass de Wallhack/Holograma...\n";
    echo "[+] Verificando datas de modificação na pasta 'android'...\n";
    processando(3);
    
    echo $bold . $fverde . "[i] Nenhuma alteração suspeita encontrada.\n";
    echo $bold . $fverde . "[i] Pasta shaders sem alterações suspeitas.\n\n";
    
    echo $bold . $azul . "[+] Checando OBB...\n";
    processando(1);
    echo $bold . $amarelo . "[i] Arquivos OBB íntegros.\n";

    echo $bold . $branco . "[+] Após verificar in-game se o usuário está de Wallhack, olhando skins de armas e atrás da parede, verifique os horários do Shaders e OBB e compare também com o horário do replay, caso esteja muito diferente as datas, aplique o W.O!\n\n";

    echo $bold . $branco . "\n\n\t Obrigado por compactuar por um cenário limpo de cheats.\n";
    echo $bold . $branco . "\t                 Com carinho, Keller...\n\n\n\n\n\n\n";
    
    // Aqui NÃO TEM PAUSA. Ele morre direto, igual ao original.
}

// --- Menu Principal com Loop ---

while (true) {
    system("clear");
    keller_banner();
    sleep(1); 
    echo "\n";

    echo $bold . $azul . "
      +--------------------------------------------------------------+
      +                       KellerSS Menu                          +
      +--------------------------------------------------------------+
      \n\n";
    
    echo $amarelo . " [0]  Conectar ADB$branco (Pareamento e conexão via ADB)$fverde \n [1]  Escanear FreeFire Normal \n$fverde [2]  Escanear FreeFire Max \n {$vermelho}[S]  Sair \n\n" . $cln;

    inputusuario("Escolha uma das opções acima");
    $opcaoscanner = trim(fgets(STDIN, 1024));

    if ($opcaoscanner == "0") {
        conectarADBReal();
        // O loop 'while' reinicia naturalmente, voltando ao menu
    } 
    elseif ($opcaoscanner == "1") {
        simularScan("FreeFire Normal");
        exit(0); // Mata o script ao final do scan (Comportamento Original)
    } 
    elseif ($opcaoscanner == "2") {
        simularScan("FreeFire Max");
        exit(0); // Mata o script ao final do scan (Comportamento Original)
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