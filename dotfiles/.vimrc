syntax on
colorscheme molokai
set autochdir
source $VIMRUNTIME/macros/matchit.vim
set clipboard=unnamedplus
set t_Co=256
set number
set title
set ambiwidth=double
set expandtab
set list
set listchars=tab:»-,trail:-,extends:»,precedes:«,nbsp:%
set nocompatible
set directory=~/.vim/tmp
set backspace=indent,eol,start
set tabstop=2
set shiftwidth=2
set smartindent
set hlsearch
set incsearch
set hidden
set redrawtime=10000
set cursorline
set timeout timeoutlen=1000 ttimeoutlen=50
set wildmenu
set wildmode=list:longest"autocmd InsertEnter,InsertLeave * set cursorline!
set mouse=a
inoremap <expr><TAB>  pumvisible() ? "\<C-n>" : "\<TAB>"

" imap <expr><Enter>
"       \ neosnippet#expandable_or_jumpable() ?
"       \    "\<Plug>(neosnippet_expand_or_jump)" :
"       \    "\<Enter>"


let $BASH_ENV = "~/.bash_aliases"

function! Hardmode()
  noremap <Up> <Nop>
  noremap <Down> <Nop>
  noremap <Left> <Nop>
  noremap <Right> <Nop>
endfunction

command! -nargs=1 -complete=file  T :tabnew <args>
function! T(name)
  tabnew name
endfunction
" let mapleader="\<Space>"
" nnoremap <Leader>w :w<CR>
nnoremap <F3> :noh<CR>
autocmd BufNewFile *.py 0r ~/.vim/template/py.py
nnoremap <F4> :Prettier<CR>
au BufWrite *.[ch] call Clang_format()
au BufWrite *.[ch]pp call Clang_format()
au BufNewFile,BufRead *.gs setf gnuplot
autocmd BufNewFile *.vue 0r ~/.vim/template/vue.vue
if has('persistent_undo')
  set undodir=~/.vim/undo
  set undofile
endif
if has('vim_starting')
    " 挿入モード時に非点滅の縦棒タイプのカーソル
    let &t_SI .= "\e[6 q"
    " ノーマルモード時に非点滅のブロックタイプのカーソル
    let &t_EI .= "\e[2 q"
    " 置換モード時に非点滅の下線タイプのカーソル
    let &t_SR .= "\e[4 q"
endif
call plug#begin('~/.vim/plugged')
Plug 'Shougo/unite.vim'
Plug 'scrooloose/nerdtree'
Plug 'Shougo/neomru.vim'
let g:indent_guides_enable_on_vim_startup = 1
Plug 'Shougo/deoplete.nvim'
Plug 'roxma/nvim-yarp'
Plug 'roxma/vim-hug-neovim-rpc'
let g:deoplete#enable_at_startup = 1
let g:neosnippet#enable_completed_snippet = 1
Plug 'mattn/emmet-vim'
Plug 'vim-airline/vim-airline'
Plug 'prettier/vim-prettier', {
 \ 'do': 'yarn install',
 \ 'branch': 'release/1.x',
 \ 'for': [
   \ 'c',
   \ 'javascript',
   \ 'typescript',
   \ 'css',
   \ 'less',
   \ 'scss',
   \ 'json',
   \ 'graphql',
   \ 'markdown',
   \ 'vue',
   \ 'lua',
   \ 'php',
   \ 'python',
   \ 'ruby',
   \ 'html',
   \ 'swift' ] }
Plug 'vim-scripts/a.vim'
" Plug 'justmao945/vim-clang'
Plug 'vim-airline/vim-airline-themes'
Plug 'tpope/vim-markdown'
Plug 'kannokanno/previm'
Plug 'tyru/open-browser.vim'
Plug 'tomtom/tcomment_vim'
" Plug 'Shougo/neosnippet.vim'
" Plug 'Shougo/neosnippet-snippets'
Plug 'ujihisa/neco-look'
Plug 'dense-analysis/ale'
" Plug 'beanworks/vim-phpfmt'
Plug 'fatih/vim-go'
" Plug 'Chiel92/vim-autoformat'
call plug#end()
let g:airline#extensions#tabline#enabled = 1
let g:airline#extensions#tabline#buffer_idx_mode = 1
" let g:airline_theme='distinguished'
autocmd BufRead,BufNewFile *.mkd  set filetype=markdown
autocmd BufRead,BufNewFile *.md  set filetype=markdown
" Need: kannokanno/previm
nnoremap <silent> <C-p> :PrevimOpen<CR> " Ctrl-pでプレビュー
" 自動で折りたたまないようにする
let g:vim_markdown_folding_disabled = 1
let g:previm_enable_realtime = 1
let g:previm_show_header = 0
nnoremap <silent><C-e> :NERDTreeToggle<CR>
" let g:prettier#config#tab_width = 4 
let g:ale_php_phpcs_executable = '/home/endo/.config/composer/vendor/bin/phpcs'
let g:ale_php_phpcbf_executable = '/home/endo/.config/composer/vendor/bin/phpcbf'
let g:ale_php_phpcs_standard = 'PSR1,PSR2'
let g:ale_php_phpcbf_standard = 'PSR1,PSR2'
let g:ale_php_phpcs_use_global = 1
let g:ale_php_phpcbf_use_global = 1
let g:ale_javascript_prettier_options = '--tab-width 2 --print-width 80 --trailing-comma es5'
let g:user_emmet_settings = {
      \ 'variables' : {
      \  'lang' : "ja"
      \ }
      \}

let g:neocomplete#text_mode_filetypes = {
      \ 'rst': 1,
      \ 'markdown': 1,
      \ 'gitrebase': 1,
      \ 'gitcommit': 1,
      \ 'vcs-commit': 1,
      \ 'hybrid': 1,
      \ 'text': 1,
      \ 'help': 1,
      \ 'tex': 1,
      \ }
let g:ale_fix_on_save=1
let g:ale_linters_explicit = 1
let b:ale_linter_aliases = ['javascript', 'vue']
let b:ale_linters = {
      \ 'javascript':['eslint'],
      \ 'php':['phpcs','php'],
      \ 'vue':['eslint'],
      \ 'python':['flake8','pylint']
      \}
let g:ale_fixer_aliases = ['javascript', 'vue']
let g:ale_fixers = {
      \ 'javascript':['prettier','eslint'],
      \ 'vue':['prettier','eslint'],
      \ 'html':['prettier'],
      \ 'php':['phpcbf'],
      \ 'markdown':['prettier'],
      \ 'python':['autopep8','black','isort']
      \}
function! Clang_format()
  let now_line = line(".")
  exec ":%! clang-format"
  exec ":" . now_line
endfunction
let g:phpfmt_standard = 'PEAR'
let g:phpfmt_autosave = 1
" let g:pid = getpid()
" let g:tag_file_path = "/tmp/" . g:pid . "_tags"
" function! _CtagsUpdate()
"     exe '!ctags -R -f '.g:tag_file_path.' `pwd` &'
"     exe 'set tags='.g:tag_file_path
" endfunction
" command! CtagsUpdate call _CtagsUpdate()
"
" function! _CtagsRemove()
"     exe '!rm '.g:tag_file_path
" endfunction
" command! CtagsRemove call _CtagsRemove()
"
" let current_path = expand("%:p")
" let match_idx = match(current_path, "/newcppera")
" if match_idx != -1
"     autocmd VimEnter * silent! :CtagsUpdate
"     autocmd BufWrite * silent! :CtagsUpdate
"     autocmd VimLeave * silent! :CtagsRemove
" endif
