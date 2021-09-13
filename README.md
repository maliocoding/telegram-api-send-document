# telegram-api-send-document
This api for send document to telegram group chat via bot,

send data via post data with telegram api url, the paramater is:
https://api.telegram.org/bot[[BotKey]]/sendDocument?chat_id=[[chatID]]

- first you need 2 param BotKey and chatID, you will get it from registiring bot from telegram.org
  this link will help you to craete telegram bot
  https://sendpulse.com/knowledge-base/chatbot/create-telegram-chatbot
  and you will get bot key

- create group on telegram, add your bot and contacs to your group
- to get chatID you can open url : https://api.telegram.org/bot[[botKey]]/getUpdates
  this example:
  ![image](https://user-images.githubusercontent.com/20354263/133041960-338a5e1e-d79e-4641-b179-7492d6100375.png)
  "-584925182" this id will be your chatId
- finally you can post data with curl POST data

