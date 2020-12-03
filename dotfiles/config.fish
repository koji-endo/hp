function attach_tmux_session_if_needed
    set ID (tmux list-sessions)
    if test -z "$ID"
        tmux new-session
        return
    end

    set new_session "Create New Session" 
    set ID (echo $ID\n$new_session | peco --on-cancel=error | cut -d: -f1)
    if test "$ID" = "$new_session"
        tmux new-session
    else if test -n "$ID"
        tmux attach-session -t "$ID"
    end
end

if test -z $TMUX
    attach_tmux_session_if_needed
end
set jny ~/Dropbox/4s/lab/journey/
set l ~/Dropbox/4s/lab/
set NODE_PATH /home/endo/.nvm/versions/node/v8.16.2/lib/node_modules
eval (pyenv init - | source)
eval (pyenv virtualenv-init - | source)
alias start='xdg-open $1 >/dev/null 2>&1' 
alias cp='cp -i'
history-merge
