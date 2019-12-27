autoload -Uz colors
colors
autoload -Uz compinit
compinit
PROMPT=$'%{\e[38;5;037m%}%n@%m:%d$ %{\e[0m%}'

HISTFILE=$HOME/.zsh_history
HISTSIZE=999999
SAVEHIST=999999
setopt share_history
setopt hist_ignore_all_dups
setopt extended_history
setopt hist_reduce_blanks
export PYENV_ROOT="$HOME/.pyenv"
export PATH="$PYENV_ROOT/bin:$PATH"
export PATH=~/.local/bin:$PATH
export PATH=~/go/bin:$PATH
export jny=~/Dropbox/4s/lab/journey/
export l=~/Dropbox/4s/lab/
if command -v pyenv 1>/dev/null 2>&1; then
  eval "$(pyenv init -)"
fi

if [ $SHLVL = 1 ]; then
  tmux
fi

if [ -f ~/.bash_aliases ]; then
    . ~/.bash_aliases
fi

alias grep='grep --color=auto'
alias ls='ls --color=auto'
alias rm='rm -i'
alias ll='ls -alF'
alias la='ls -A'
alias l='ls -CF'
# https://qiita.com/knao124/items/04e3625eb12237de5743
export sandbox=/home/endo/Documents/2papp/sandbox_go
export svg=/home/endo/Dropbox/4s/lab/espring/0624_seminar
export tp=~/Documents/2papp/process_bin/
export ocv=~/Documents/2papp/process_bin/newcppera/opencv_hello_again
export eve=~/Documents/2papp/process_bin/newcppera/evescan
xmodmap ~/.Xmodmap >/dev/null 2>&1
function google() {
    local str opt
    if [ $# != 0 ]; then
        for i in $*; do
            str="$str+$i"
        done
        str=`echo $str | sed 's/^\+//'`
        opt='search?num=50&hl=ja&lr=lang_ja'
        opt="${opt}&q=${str}"
    fi
    w3m -4 http://www.google.co.jp/$opt
}

function engoogle() {
    local str opt
    if [ $# != 0 ]; then
        for i in $*; do
            str="$str+$i"
        done
        str=`echo $str | sed 's/^\+//'`
        opt='search?num=50&hl=en&lr=lang_en'
        opt="${opt}&q=${str}"
    fi
    w3m -4 http://www.google.co.jp/$opt
}
export obj=/home/endo/Dropbox/4s/lab/espring/obj_test;
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion
