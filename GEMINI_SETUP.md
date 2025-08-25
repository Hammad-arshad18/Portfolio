# Gemini AI Integration Setup

The portfolio includes AI-powered features for recruiters to ask technical questions and get project summaries.

## Getting Your Gemini API Key

1. Visit [Google AI Studio](https://makersuite.google.com/app/apikey)
2. Sign in with your Google account
3. Click "Create API Key"
4. Copy the generated API key

## Configuration

1. Open your `.env` file
2. Add your API key:
   ```
   GEMINI_API_KEY=your_api_key_here
   ```
3. Save the file

## Features

### Recruiter Q&A
- Located in the "Home" section
- Allows recruiters to ask technical questions
- AI responds as Hammad Arshad with professional expertise

### Project Summaries
- Available on each project card in the "Projects" section
- Click "Get Summary" button to generate AI-powered project summaries
- Focuses on technologies and business impact

## Troubleshooting

- If you see "AI feature is not configured" message, ensure your API key is properly set in the `.env` file
- The API key is free to use with generous limits
- Make sure there are no extra spaces in your `.env` file

## Security Note

Never commit your API key to version control. The `.env` file should be added to `.gitignore`.
