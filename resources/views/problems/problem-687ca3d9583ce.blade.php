<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZSH Developer Terminal Setup</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; max-width: 900px; margin: auto; }
        pre { background: #f4f4f4; padding: 10px; border-radius: 5px; position: relative; overflow-x: auto; }
        code { color: #d63384; }
        h1, h2, h3 { color: #333; }
        hr { margin: 30px 0; }
        button.copy-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            padding: 5px;
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        button.copy-btn svg {
            width: 18px;
            height: 18px;
            fill: #555;
        }
        button.copy-btn:hover svg { fill: #000; }
    </style>
</head>
<body>
<h1>💻 ZSH Developer Terminal Setup</h1>

<p>This guide walks you through setting up a fast, beautiful, and productive terminal using <strong>Zsh</strong>, <strong>Oh My Zsh</strong>, <strong>Powerlevel10k</strong>, and essential plugins for autosuggestions, syntax highlighting, history search, and more.</p>

<hr />

<h2>📦 Requirements</h2>

<ul>
<li>Ubuntu/Linux system</li>
<li><code>zsh</code>, <code>git</code>, and <code>curl</code></li>
</ul>

<hr />

<h2>⚙️ Installation Steps</h2>

<h3>1. Install Zsh</h3>

<div class="codehilite">
<pre><span></span><code>sudo<span class="w"> </span>apt<span class="w"> </span>update<span class="w"> </span><span class="o">&amp;&amp;</span><span class="w"> </span>sudo<span class="w"> </span>apt<span class="w"> </span>install<span class="w"> </span>zsh<span class="w"> </span>-y
</code></pre>
</div>

<h3>2. Make Zsh the Default Shell</h3>

<div class="codehilite">
<pre><span></span><code>chsh<span class="w"> </span>-s<span class="w"> </span><span class="k">$(</span>which<span class="w"> </span>zsh<span class="k">)</span>
</code></pre>
</div>

<p>Then log out and log back in or run:</p>

<div class="codehilite">
<pre><span></span><code>zsh
</code></pre>
</div>

<h3>3. Install Oh My Zsh</h3>

<div class="codehilite">
<pre><span></span><code>sh<span class="w"> </span>-c<span class="w"> </span><span class="s2">&quot;</span><span class="k">$(</span>curl<span class="w"> </span>-fsSL<span class="w"> </span>https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh<span class="k">)</span><span class="s2">&quot;</span>
</code></pre>
</div>

<h3>4. Install Plugins</h3>

<h4>Autosuggestions</h4>

<div class="codehilite">
<pre><span></span><code>git<span class="w"> </span>clone<span class="w"> </span>https://github.com/zsh-users/zsh-autosuggestions<span class="w">   </span><span class="si">${</span><span class="nv">ZSH_CUSTOM</span><span class="k">:-</span><span class="p">~/.oh-my-zsh/custom</span><span class="si">}</span>/plugins/zsh-autosuggestions
</code></pre>
</div>

<h4>Syntax Highlighting</h4>

<div class="codehilite">
<pre><span></span><code>git<span class="w"> </span>clone<span class="w"> </span>https://github.com/zsh-users/zsh-syntax-highlighting.git<span class="w">   </span><span class="si">${</span><span class="nv">ZSH_CUSTOM</span><span class="k">:-</span><span class="p">~/.oh-my-zsh/custom</span><span class="si">}</span>/plugins/zsh-syntax-highlighting
</code></pre>
</div>

<h4>History Substring Search</h4>

<div class="codehilite">
<pre><span></span><code>git<span class="w"> </span>clone<span class="w"> </span>https://github.com/zsh-users/zsh-history-substring-search<span class="w">   </span><span class="si">${</span><span class="nv">ZSH_CUSTOM</span><span class="k">:-</span><span class="p">~/.oh-my-zsh/custom</span><span class="si">}</span>/plugins/zsh-history-substring-search
</code></pre>
</div>

<h4>FZF (for fuzzy history search)</h4>

<div class="codehilite">
<pre><span></span><code>sudo<span class="w"> </span>apt<span class="w"> </span>install<span class="w"> </span>fzf<span class="w"> </span>-y
</code></pre>
</div>

<h4>Powerlevel10k Theme</h4>

<div class="codehilite">
<pre><span></span><code>git<span class="w"> </span>clone<span class="w"> </span>--depth<span class="o">=</span><span class="m">1</span><span class="w"> </span>https://github.com/romkatv/powerlevel10k.git<span class="w">   </span><span class="si">${</span><span class="nv">ZSH_CUSTOM</span><span class="k">:-</span><span class="nv">$HOME</span><span class="p">/.oh-my-zsh/custom</span><span class="si">}</span>/themes/powerlevel10k
</code></pre>
</div>

<hr />

<h2>🛠️ Zsh Configuration (<code>~/.zshrc</code>)</h2>

<p>Paste the following into your <code>~/.zshrc</code>:</p>

<div class="codehilite">
<pre><span></span><code><span class="c1"># ----------------------------------------</span>
<span class="c1"># ⚙️  Powerlevel10k Instant Prompt</span>
<span class="c1"># ----------------------------------------</span>
<span class="nb">typeset</span><span class="w"> </span>-g<span class="w"> </span><span class="nv">POWERLEVEL9K_INSTANT_PROMPT</span><span class="o">=</span>quiet

<span class="k">if</span><span class="w"> </span><span class="o">[[</span><span class="w"> </span>-r<span class="w"> </span><span class="s2">&quot;</span><span class="si">${</span><span class="nv">XDG_CACHE_HOME</span><span class="k">:-</span><span class="nv">$HOME</span><span class="p">/.cache</span><span class="si">}</span><span class="s2">/p10k-instant-prompt-</span><span class="si">${</span><span class="p">(%)</span><span class="k">:-</span><span class="p">%n</span><span class="si">}</span><span class="s2">.zsh&quot;</span><span class="w"> </span><span class="o">]]</span><span class="p">;</span><span class="w"> </span><span class="k">then</span>
<span class="w">  </span><span class="nb">source</span><span class="w"> </span><span class="s2">&quot;</span><span class="si">${</span><span class="nv">XDG_CACHE_HOME</span><span class="k">:-</span><span class="nv">$HOME</span><span class="p">/.cache</span><span class="si">}</span><span class="s2">/p10k-instant-prompt-</span><span class="si">${</span><span class="p">(%)</span><span class="k">:-</span><span class="p">%n</span><span class="si">}</span><span class="s2">.zsh&quot;</span>
<span class="k">fi</span>

<span class="c1"># ----------------------------------------</span>
<span class="c1"># 📁 Oh My Zsh Base Config</span>
<span class="c1"># ----------------------------------------</span>
<span class="nb">export</span><span class="w"> </span><span class="nv">ZSH</span><span class="o">=</span><span class="s2">&quot;</span><span class="nv">$HOME</span><span class="s2">/.oh-my-zsh&quot;</span>
<span class="nv">ZSH_THEME</span><span class="o">=</span><span class="s2">&quot;powerlevel10k/powerlevel10k&quot;</span>

<span class="nv">plugins</span><span class="o">=(</span>
<span class="w">  </span>git
<span class="w">  </span>zsh-autosuggestions
<span class="w">  </span>zsh-history-substring-search
<span class="w">  </span>zsh-syntax-highlighting
<span class="o">)</span>

<span class="nb">source</span><span class="w"> </span><span class="nv">$ZSH</span>/oh-my-zsh.sh

<span class="c1"># ----------------------------------------</span>
<span class="c1"># ⬆️ Substring History Search with Up/Down</span>
<span class="c1"># ----------------------------------------</span>
bindkey<span class="w"> </span><span class="s2">&quot;</span><span class="si">${</span><span class="nv">terminfo</span><span class="p">[kcuu1]</span><span class="si">}</span><span class="s2">&quot;</span><span class="w"> </span>history-substring-search-up
bindkey<span class="w"> </span><span class="s2">&quot;</span><span class="si">${</span><span class="nv">terminfo</span><span class="p">[kcud1]</span><span class="si">}</span><span class="s2">&quot;</span><span class="w"> </span>history-substring-search-down

<span class="c1"># ----------------------------------------</span>
<span class="c1"># 🎨 Autosuggestions &amp; Highlighting</span>
<span class="c1"># ----------------------------------------</span>
<span class="nv">ZSH_AUTOSUGGEST_HIGHLIGHT_STYLE</span><span class="o">=</span><span class="s1">&#39;fg=cyan&#39;</span>

<span class="c1"># ----------------------------------------</span>
<span class="c1"># 🧠 Powerlevel10k User Prompt</span>
<span class="c1"># ----------------------------------------</span>
<span class="o">[[</span><span class="w"> </span>!<span class="w"> </span>-f<span class="w"> </span>~/.p10k.zsh<span class="w"> </span><span class="o">]]</span><span class="w"> </span><span class="o">||</span><span class="w"> </span><span class="nb">source</span><span class="w"> </span>~/.p10k.zsh

<span class="c1"># ----------------------------------------</span>
<span class="c1"># 🔧 Developer Aliases and Shortcuts</span>
<span class="c1"># ----------------------------------------</span>
<span class="o">[</span><span class="w"> </span>-f<span class="w"> </span>~/.laravel_aliases.sh<span class="w"> </span><span class="o">]</span><span class="w"> </span><span class="o">&amp;&amp;</span><span class="w"> </span><span class="nb">source</span><span class="w"> </span>~/.laravel_aliases.sh
<span class="o">[</span><span class="w"> </span>-f<span class="w"> </span>~/.git_aliases.sh<span class="w"> </span><span class="o">]</span><span class="w"> </span><span class="o">&amp;&amp;</span><span class="w"> </span><span class="nb">source</span><span class="w"> </span>~/.git_aliases.sh
<span class="o">[</span><span class="w"> </span>-f<span class="w"> </span>~/.helper.sh<span class="w"> </span><span class="o">]</span><span class="w"> </span><span class="o">&amp;&amp;</span><span class="w"> </span><span class="nb">source</span><span class="w"> </span>~/.helper.sh
<span class="o">[</span><span class="w"> </span>-f<span class="w"> </span>~/.aliases<span class="w"> </span><span class="o">]</span><span class="w"> </span><span class="o">&amp;&amp;</span><span class="w"> </span><span class="nb">source</span><span class="w"> </span>~/.aliases

<span class="nb">alias</span><span class="w"> </span><span class="nv">bruno</span><span class="o">=</span><span class="s1">&#39;flatpak run com.usebruno.Bruno &amp; disown&#39;</span>

<span class="nb">export</span><span class="w"> </span><span class="nv">BUN_INSTALL</span><span class="o">=</span><span class="s2">&quot;</span><span class="nv">$HOME</span><span class="s2">/.bun&quot;</span>
<span class="nb">export</span><span class="w"> </span><span class="nv">PATH</span><span class="o">=</span><span class="s2">&quot;</span><span class="nv">$BUN_INSTALL</span><span class="s2">/bin:</span><span class="nv">$PATH</span><span class="s2">&quot;</span>

<span class="c1"># ----------------------------------------</span>
<span class="c1"># 🔍 FZF Integration</span>
<span class="c1"># ----------------------------------------</span>
<span class="nb">source</span><span class="w"> </span>/usr/share/doc/fzf/examples/key-bindings.zsh<span class="w"> </span><span class="m">2</span>&gt;/dev/null<span class="w"> </span><span class="o">||</span><span class="w"> </span><span class="nb">true</span>
<span class="nb">source</span><span class="w"> </span>~/.fzf/shell/key-bindings.zsh<span class="w"> </span><span class="m">2</span>&gt;/dev/null<span class="w"> </span><span class="o">||</span><span class="w"> </span><span class="nb">true</span>
</code></pre>
</div>

<hr />

<h2>🚀 Final Steps</h2>

<h3>Reload Terminal:</h3>

<div class="codehilite">
<pre><span></span><code><span class="nb">exec</span><span class="w"> </span>zsh
</code></pre>
</div>

<h3>Customize Powerlevel10k Prompt:</h3>

<div class="codehilite">
<pre><span></span><code>p10k<span class="w"> </span>configure
</code></pre>
</div>

<p>Follow the prompts to configure your terminal appearance.</p>

<hr />

<h2>✅ Done!</h2>

<p>You now have a beautiful and productive terminal with:</p>

<ul>
<li>🎨 Syntax highlighting</li>
<li>💡 Autosuggestions</li>
<li>🔁 Keyword-based history navigation</li>
<li>⚡ Fuzzy search with FZF</li>
<li>💥 Powerlevel10k prompt</li>
<li>⚒️ Laravel &amp; Git developer aliases</li>
</ul>

<hr />

<h2>🧠 Tip</h2>

<p>You can backup this setup by saving your <code>.zshrc</code>, <code>.p10k.zsh</code>, and alias files to a GitHub repo.</p>

<p>Happy hacking! 🧑‍💻⚡</p>


<script>
// Add Copy buttons with SVG icon to all code blocks
document.querySelectorAll('pre').forEach(pre => {
    const button = document.createElement('button');
    button.className = 'copy-btn';
    button.innerHTML = `
        <svg viewBox="0 0 24 24">
            <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 18H8V7h11v16z"/>
        </svg>`;
    pre.appendChild(button);

    button.addEventListener('click', () => {
        const code = pre.innerText.replace(/Copy/, '').trim();
        navigator.clipboard.writeText(code).then(() => {
            const original = button.innerHTML;
            button.innerHTML = '<span style="font-size:12px;color:green;">Copied!</span>';
            setTimeout(() => button.innerHTML = original, 2000);
        });
    });
});
</script>
</body>
</html>
