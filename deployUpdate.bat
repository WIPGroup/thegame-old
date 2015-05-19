set ACCESS_TOKEN=41a7de13241f499ab0849238a8b7b00e
set ENVIRONMENT=production
for /f "delims=" %a in ('whoami') do @set LOCAL_USERNAME=%a
for /f "delims=" %b in ('git log -n 1 --pretty=format:"%H"') do @set REVISION=%b
"E:\AppData\Roaming\Composer\vendor\bin\curl.exe" https://api.rollbar.com/api/1/deploy/ -F access_token=%ACCESS_TOKEN% -F environment=%ENVIRONMENT% -F revision=%b% -F local_username=%a%
