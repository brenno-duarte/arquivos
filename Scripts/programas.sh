# Atualiza a lista de repositório
sudo apt update

# Adiciona os PPA's necessários
sudo add-apt-repository ppa:kdenlive/kdenlive-stable -y
sudo apt-add-repository ppa:dolphin-emu/ppa -y

# Atualiza novamente o repositório para aplicar os PPA's
sudo apt update

# Instala os programas do repositório
sudo apt install notify-osd
sudo apt install virtualbox -y
sudo apt install simplescreenrecorder -y
sudo apt install wget -y
sudo apt install git -y
sudo apt install dolphin-emu -y

# Cria uma pasta para armazenar os arquivos .deb
mkdir /home/$USER/PacotesDeb/

# Baixa os arquivos .deb e depois instala os mesmos
cd /home/$USER/PacotesDeb/
wget -c https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
wget -c https://retrocdn.net/images/c/ca/Kega-fusion_3.63-2_i386.deb
sudo dpkg -i *.deb

echo "Finalizado"
notify-send -i emblem-default -u normal "Finalizado!"
