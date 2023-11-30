# ForC:

Public-facing component presenting projects.
Serves as the user's central point for account management and settings.
Acts as the gateway for users to interact with different applications.

## Scalability and Hosting:

The system is designed to accommodate growth and potential future collaboration.
The modular structure facilitates the extraction or migration of components to separate servers if needed.

## API Communication:

Modules communicate through APIs, supporting a decoupled and flexible architecture.
Potential for different modules to be developed and maintained independently.

## User-Centric Focus:

Emphasizes user experience by allowing customization and tracking of progress.
Centralizes user-related functionalities.

## Subparts (/ProjectApps)

### DGW App:

Currently embede in main app. but designed for potential future migration to a high-performance server.
Associated API controllers handle DGW tracking data, calculations, and other functionalities.

Provides functionality for tracking progress through quests and associated stats.
Contains the business logic for the system.

## Future Considerations:

Potential for hosting components on high-performance servers as the project grows.
Facilitates collaboration as the team expands.

-- *** --

## Tech:
Laravel, Web Components, Tailwind, CSS Components: Tailwind Elements, Mamba UI

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
