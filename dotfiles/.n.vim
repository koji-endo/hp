syntax on
set autochdir
source $VIMRUNTIME/macros/matchit.vim
set clipboard=unnamedplus
set t_Co=256
set number
set spelllang=en,cjk
set title
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
set smartcase
set termguicolors
set ignorecase
set timeout timeoutlen=1000 ttimeoutlen=50
set wildmenu
set wildmode=list:longest"autocmd InsertEnter,InsertLeave * set cursorline!
set mouse=a
" 挿入モードからnormalモードへの遅延をなくす
set ttimeoutlen=50
au BufRead,BufNewFile *.vue set filetype=vue 
au BufRead,BufNewFile *.ts set filetype=typescript 
au BufNewFile,BufRead *.gs setf gnuplot
autocmd BufRead,BufNewFile *.hoc setfiletype hoc
au BufNewFile,BufRead *.php setlocal tabstop=4 softtabstop=4 shiftwidth=4
nmap <F4> <Plug>(coc-format)
nnoremap <F3> :noh<CR>
nnoremap <F2> :set nospell<CR>
nnoremap <F1> :set spell<CR>
nnoremap j gj
nnoremap k gk
nnoremap <Down> gj
nnoremap <Up> gk
nnoremap gj j
nnoremap gk k
nnoremap tj <C-w>j
nnoremap tk <C-w>k
nnoremap tl <C-w>l
nnoremap th <C-w>h
" noremap <F4> <Plug>(coc-format)
" noremap! <F3> :noh<CR>
call plug#begin('~/.local/share/nvim/plugged')
Plug 'tomasr/molokai'
" Plug 'fatih/vim-go'  "導入したいプラグイン
Plug 'neoclide/coc.nvim', {'branch': 'release'}
" Plug 'ujihisa/neco-look'
Plug 'mattn/emmet-vim'
Plug 'scrooloose/nerdtree'
Plug 'tomtom/tcomment_vim'
Plug 'posva/vim-vue'
Plug 'osyo-manga/vim-anzu'
Plug 'vim-airline/vim-airline'
" Plug 'tpope/vim-fugitive' "gitらしい
Plug 'tpope/vim-surround' "
Plug 'leafgarland/typescript-vim'
Plug 'nathanaelkane/vim-indent-guides'

call plug#end()
colorscheme molokai

"NERDTree
nnoremap <silent><C-e> :NERDTreeToggle<CR>

function! s:check_back_space() abort
  let col = col('.') - 1
  return !col || getline('.')[col - 1]  =~ '\s'
endfunction

" tabで補完がやりたい
inoremap <silent><expr> <Tab>
      \ pumvisible() ? "\<C-n>" :
      \ <SID>check_back_space() ? "\<Tab>" :
      \ coc#refresh()
autocmd FileType vue syntax sync fromstart
" airline x coc
let g:airline#extensions#coc#enabled = 1
let g:airline#extensions#tabline#enabled= 1
" 定義元ジャンプ (https://wonderwall.hatenablog.com/entry/2019/08/17/003000)

nmap <silent> gd <Plug>(coc-definition)
nmap <silent> gy <Plug>(coc-type-definition)
nmap <silent> gi <Plug>(coc-implementation)
nmap <silent> gr <Plug>(coc-references)
nmap <silent> gp <Plug>(coc-diagnostic-prev)
nmap <silent> gn <Plug>(coc-diagnostic-next)
nnoremap <silent> K :call <SID>show_documentation()<CR>

function! s:show_documentation()
  if (index(['vim','help'], &filetype) >= 0)
    execute 'h '.expand('<cword>')
  else
    call CocAction('doHover')
  endif
endfunction

" 括弧でカーソルを見失う問題
let loaded_matchparen = 1


" anzuの設定
nmap n <Plug>(anzu-n-with-echo)
nmap N <Plug>(anzu-N-with-echo)
nmap * <Plug>(anzu-star-with-echo)
nmap # <Plug>(anzu-sharp-with-echo)
" clear status
nmap <Esc><Esc> <Plug>(anzu-clear-search-status)
" statusline
set statusline=%{anzu#search_status()}

" バッファをvspで開く
command! -nargs=0 -register B call B(<reg>)
function! B(number)
  vsp
  let x=a:number."b"
  execute x
  "echo a:number
   
  "b expand(a:number+0)
endfunction

" aliasの利用
let $BASH_ENV = "~/.bash_aliases"


if has('persistent_undo')
  set undodir=~/.vim/undo
  set undofile
endif

set ambiwidth=double


function! Hardmode()
  noremap <Up> <Nop>
  noremap <Down> <Nop>
  noremap <Left> <Nop>
  noremap <Right> <Nop>
endfunction
