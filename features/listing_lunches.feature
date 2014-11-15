Feature: Listing existing lunches

	Scenario: No lunches exist
		Given there are no lunches
		When I list the lunches
		Then I should see no lunches

	Scenario: Some lunches exist
		Given there are some lunches
		When I list the lunches
		Then I should see some lunches

	Scenario: Some lunches exist for current month
		Given there are some lunches for the current month
		When I list the lunches for the current month
		Then I should see some lunches for the current month

	Scenario: Some lunches exist for the next month
		Given there are some lunches for the next month
		When I list the lunches for the next month
		Then I should see some lunches for the next month