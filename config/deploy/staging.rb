# repository info
set :branch, "master"

# This may be the same as your `Web` server
role :app, "kbhns.ccistaging.com"

# directories
set :deploy_to, "/home/staging/subdomains/KBHNS"
set :public, "#{deploy_to}/public_html"
set :extensions, %w[plg_ie6 public template]
