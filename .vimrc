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
set hidden
set cursorline
set timeout timeoutlen=1000 ttimeoutlen=50
"autocmd InsertEnter,InsertLeave * set cursorline!
set mouse=a
inoremap <expr><TAB>  pumvisible() ? "\<C-n>" : "\<TAB>"
" imap <expr><TAB>  pumvisible() ? "\<C-n>" : "\<TAB>"

" imap <expr><TAB>
"  	 \ neosnippet#expandable_or_jumpable() ?
"  	 \    "\<Plug>(neosnippet_expand_or_jump)" :
"     \ pumvisible() ? "\<C-n>" : "\<TAB>"

imap <expr><Enter>
	 \ neosnippet#expandable_or_jumpable() ?
   \    "\<Plug>(neosnippet_expand_or_jump)" :
   \    "\<Enter>"


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
"command! Hardmode 
"call Hardmode()
let mapleader="\<Space>"
nnoremap <Leader>w :w<CR>

autocmd BufNewFile *.py 0r ~/.vim/template/py.py
autocmd BufNewFile *.vue 0r ~/.vim/template/vue.vue
call plug#begin('~/.vim/plugged')
Plug 'Shougo/unite.vim'
Plug 'scrooloose/nerdtree'
Plug 'Shougo/neomru.vim'
" Plug 'nathanaelkane/vim-indent-guides'
let g:indent_guides_enable_on_vim_startup = 1
Plug 'Shougo/deoplete.nvim'
Plug 'roxma/nvim-yarp'
Plug 'roxma/vim-hug-neovim-rpc'
" call deoplete#enable()
let g:deoplete#enable_at_startup = 1
let g:neosnippet#enable_completed_snippet = 1
Plug 'mattn/emmet-vim'
" Plug 'cohama/lexima.vim'
Plug 'vim-airline/vim-airline'
Plug 'prettier/vim-prettier'
", {
"  \ 'do': 'yarn install',
"  \ 'branch': 'release/1.x',
"  \ 'for': [
"    \ 'javascript',
"    \ 'typescript',
"    \ 'css',
"    \ 'less',
"    \ 'scss',
"    \ 'json',
"    \ 'graphql',
"    \ 'markdown',
"    \ 'vue',
"    \ 'lua',
"    \ 'php',
"    \ 'python',
"    \ 'ruby',
"    \ 'html',
"    \ 'swift' ] }
Plug 'vim-airline/vim-airline-themes'
Plug 'tpope/vim-markdown'
Plug 'kannokanno/previm'
Plug 'tyru/open-browser.vim'
Plug 'tomtom/tcomment_vim'
Plug 'Shougo/neosnippet.vim'
Plug 'Shougo/neosnippet-snippets'
Plug 'ujihisa/neco-look'
call plug#end()
" call deoplete#custom#set('_', 'converters', ['converter_auto_paren'])

" function! s:neosnippet_complete()
"   if pumvisible()
"     return "\<c-n>"
"   else
"     if neosnippet#expandable_or_jumpable() 
"       return "\<Plug>(neosnippet_expand_or_jump)"
"     endif
"     return "\<tab>"
"   endif
" endfunction
"
" imap <expr><TAB> <SID>neosnippet_complete()
" " Plugin key-mappings.
" " Note: It must be "imap" and "smap".  It uses <Plug> mappings.
" imap <C-k>     <Plug>(neosnippet_expand_or_jump)
" smap <C-k>     <Plug>(neosnippet_expand_or_jump)
" xmap <C-k>     <Plug>(neosnippet_expand_target)
"
" " SuperTab like snippets behavior.
" " Note: It must be "imap" and "smap".  It uses <Plug> mappings.
" "imap <expr><TAB>
" " \ pumvisible() ? "\<C-n>" :
" " \ neosnippet#expandable_or_jumpable() ?
" " \    "\<Plug>(neosnippet_expand_or_jump)" : "\<TAB>"
" smap <expr><TAB> neosnippet#expandable_or_jumpable() ?
" \ "\<Plug>(neosnippet_expand_or_jump)" : "\<TAB>"
"
" For conceal markers.
" if has('conceal')
"   set conceallevel=2 concealcursor=niv
" endif


""" markdown {{{
   autocmd BufRead,BufNewFile *.mkd  set filetype=markdown
   autocmd BufRead,BufNewFile *.md  set filetype=markdown
   " Need: kannokanno/previm
   nnoremap <silent> <C-p> :PrevimOpen<CR> " Ctrl-pでプレビュー
   " 自動で折りたたまないようにする
   let g:vim_markdown_folding_disabled=1
   let g:previm_enable_realtime = 1
 " }}}
nnoremap <silent><C-e> :NERDTreeToggle<CR>
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
