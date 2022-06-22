# discord-link

Useful script for Login with Discord or Discord Account Linking systems.

When you link your account, it adds you to the server and give a specific role. Storage user discord id and access_token in a database

<h3>Installing Instructions</h3>
1. Create a discord application and bot; get CLIENT ID & CLIENT SECRET from OAuth2 Tab<br>
2. Get your bot token.<br>
3. Edit file <br>
3.1 Update your database info (line 2,5,7,10)<br>
3.2 Update Client info (line 37,39)<br>
3.3 Update redirect uri (line 69)<br>
3.4 Update line 131,235,405<br>
3.5 Update $bottoken (line 181, 259, 351, 429)<br>
4. Add redirect uri from OAuth2 Tab (Discord Developer Portal)<br>
<strong>Redirect uri should be same with file directory</strong><br>
5. Upload .sql and other files<br>
6. Script should be work, if a problem happens: ecy#5776 & https://discord.gg/dtQbk66cfb


DEMO Link: https://emircanyildirim.com/api/dcauth2.php
