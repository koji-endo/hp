onload = async function() {
  // canvasエレメントを取得
  var c = document.getElementById("canvas");
  c.width = 500;
  c.height = 500;

  // webglコンテキストを取得
  var gl = c.getContext("webgl") || c.getContext("experimental-webgl");

  // 頂点シェーダとフラグメントシェーダの生成
  var v_shader = create_shader("vs");
  var f_shader = create_shader("fs");

  // プログラムオブジェクトの生成とリンク
  var prg = create_program(v_shader, f_shader);

  // attributeLocationを配列に取得
  var attLocation = new Array();
  attLocation[0] = gl.getAttribLocation(prg, "position");
  attLocation[1] = gl.getAttribLocation(prg, "color");
  attLocation[2] = gl.getAttribLocation(prg, "textureCoord");

  // attributeの要素数を配列に格納
  var attStride = new Array();
  attStride[0] = 3;
  attStride[1] = 4;
  attStride[2] = 2;

  // 頂点の位置
  var position = [
    -1.0,
    1.0,
    0.0,
    1.0,
    1.0,
    0.0,
    -1.0,
    -1.0,
    0.0,
    1.0,
    -1.0,
    0.0,
  ];

  // 頂点色
  var color = [
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
    1.0,
  ];

  // テクスチャ座標
  var textureCoord = [0.0, 0.0, 1.0, 0.0, 0.0, 1.0, 1.0, 1.0];

  // 頂点インデックス
  var index = [0, 1, 2, 3, 2, 1];

  // VBOとIBOの生成
  var vPosition = create_vbo(position);
  var vColor = create_vbo(color);
  var vTextureCoord = create_vbo(textureCoord);
  var VBOList = [vPosition, vColor, vTextureCoord];
  var iIndex = create_ibo(index);

  // VBOとIBOの登録
  set_attribute(VBOList, attLocation, attStride);
  gl.bindBuffer(gl.ELEMENT_ARRAY_BUFFER, iIndex);

  // uniformLocationを配列に取得
  var uniLocation = new Array();
  uniLocation[0] = gl.getUniformLocation(prg, "texture");

  // 各種行列の生成と初期化
  // var m = new matIV();
  // var mMatrix = m.identity(m.create());
  // var vMatrix = m.identity(m.create());
  // var pMatrix = m.identity(m.create());
  // var tmpMatrix = m.identity(m.create());
  // var mvpMatrix = m.identity(m.create());
  //
  // // ビュー×プロジェクション座標変換行列
  // m.lookAt([0.0, 2.0, 5.0], [0, 0, 0], [0, 1, 0], vMatrix);
  // m.perspective(45, c.width / c.height, 0.1, 100, pMatrix);
  // m.multiply(pMatrix, vMatrix, tmpMatrix);

  // 深度テストを有効にする
  gl.enable(gl.DEPTH_TEST);
  gl.depthFunc(gl.LEQUAL);

  // 有効にするテクスチャユニットを指定
  gl.activeTexture(gl.TEXTURE0);

  // テクスチャ用変数の宣言

  // テクスチャを生成
  let texture = await create_texture("texture.png");
  let texture1 = await create_texture("texture1.png");

  // カウンタの宣言
  var count = 0;

  // 恒常ループ
  (function() {
    // canvasを初期化
    gl.clearColor(0.0, 0.0, 0.0, 1.0);
    gl.clearDepth(1.0);
    gl.clear(gl.COLOR_BUFFER_BIT | gl.DEPTH_BUFFER_BIT);

    // カウンタを元にラジアンを算出
    count++;
    var rad = ((count % 360) * Math.PI) / 180;

    // テクスチャをバインドする
    gl.bindTexture(gl.TEXTURE_2D, texture);

    // uniform変数にテクスチャを登録
    gl.uniform1i(uniLocation[0], 0);
    gl.drawElements(gl.TRIANGLES, index.length, gl.UNSIGNED_SHORT, 0);

    // コンテキストの再描画
    gl.flush();

    // ループのために再帰呼び出し
    // setTimeout(arguments.callee, 1000 / 30);
  })();
  document.getElementById("rewrite").onclick = () => {
    console.log("rewrite");
    rewritecanvas();
  };

  function rewritecanvas() {
    // canvasを初期化
    gl.clearColor(0.0, 0.0, 0.0, 1.0);
    gl.clearDepth(1.0);
    gl.clear(gl.COLOR_BUFFER_BIT | gl.DEPTH_BUFFER_BIT);

    // カウンタを元にラジアンを算出
    count++;
    var rad = ((count % 360) * Math.PI) / 180;

    // テクスチャをバインドする
    gl.bindTexture(gl.TEXTURE_2D, texture1);

    // uniform変数にテクスチャを登録
    gl.uniform1i(uniLocation[0], 0);
    gl.drawElements(gl.TRIANGLES, index.length, gl.UNSIGNED_SHORT, 0);

    // コンテキストの再描画
    gl.flush();

    // ループのために再帰呼び出し
    // setTimeout(arguments.callee, 1000 / 30);
  }

  // シェーダを生成する関数
  function create_shader(id) {
    // シェーダを格納する変数
    var shader;

    // HTMLからscriptタグへの参照を取得
    var scriptElement = document.getElementById(id);

    // scriptタグが存在しない場合は抜ける
    if (!scriptElement) {
      return;
    }

    // scriptタグのtype属性をチェック
    switch (scriptElement.type) {
      // 頂点シェーダの場合
      case "x-shader/x-vertex":
        shader = gl.createShader(gl.VERTEX_SHADER);
        break;

      // フラグメントシェーダの場合
      case "x-shader/x-fragment":
        shader = gl.createShader(gl.FRAGMENT_SHADER);
        break;
      default:
        return;
    }

    // 生成されたシェーダにソースを割り当てる
    gl.shaderSource(shader, scriptElement.text);

    // シェーダをコンパイルする
    gl.compileShader(shader);

    // シェーダが正しくコンパイルされたかチェック
    if (gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
      // 成功していたらシェーダを返して終了
      return shader;
    } else {
      // 失敗していたらエラーログをアラートする
      alert(gl.getShaderInfoLog(shader));
    }
  }

  // プログラムオブジェクトを生成しシェーダをリンクする関数
  function create_program(vs, fs) {
    // プログラムオブジェクトの生成
    var program = gl.createProgram();

    // プログラムオブジェクトにシェーダを割り当てる
    gl.attachShader(program, vs);
    gl.attachShader(program, fs);

    // シェーダをリンク
    gl.linkProgram(program);

    // シェーダのリンクが正しく行なわれたかチェック
    if (gl.getProgramParameter(program, gl.LINK_STATUS)) {
      // 成功していたらプログラムオブジェクトを有効にする
      gl.useProgram(program);

      // プログラムオブジェクトを返して終了
      return program;
    } else {
      // 失敗していたらエラーログをアラートする
      alert(gl.getProgramInfoLog(program));
    }
  }

  // VBOを生成する関数
  function create_vbo(data) {
    var vbo = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, vbo);
    gl.bufferData(gl.ARRAY_BUFFER, new Float32Array(data), gl.STATIC_DRAW);
    gl.bindBuffer(gl.ARRAY_BUFFER, null);
    return vbo;
  }

  // VBOをバインドし登録する関数
  function set_attribute(vbo, attL, attS) {
    for (var i in vbo) {
      gl.bindBuffer(gl.ARRAY_BUFFER, vbo[i]);
      gl.enableVertexAttribArray(attL[i]);
      gl.vertexAttribPointer(attL[i], attS[i], gl.FLOAT, false, 0, 0);
    }
  }

  // IBOを生成する関数
  function create_ibo(data) {
    var ibo = gl.createBuffer();
    gl.bindBuffer(gl.ELEMENT_ARRAY_BUFFER, ibo);
    gl.bufferData(
      gl.ELEMENT_ARRAY_BUFFER,
      new Int16Array(data),
      gl.STATIC_DRAW
    );
    gl.bindBuffer(gl.ELEMENT_ARRAY_BUFFER, null);
    return ibo;
  }

  // テクスチャを生成する関数
  function create_texture(source) {
    return new Promise((resolve, reject) => {
      let img = new Image();
      img.src = source;
      img.onload = () => {
        let tex = gl.createTexture();
        gl.bindTexture(gl.TEXTURE_2D, tex);
        gl.texImage2D(
          gl.TEXTURE_2D,
          0,
          gl.RGBA,
          gl.RGBA,
          gl.UNSIGNED_BYTE,
          img
        );
        gl.generateMipmap(gl.TEXTURE_2D);
        gl.bindTexture(gl.TEXTURE_2D, null);
        resolve(tex);
      };
      img.onerror = (e) => {
        reject(e);
      };
    });
  }
};
