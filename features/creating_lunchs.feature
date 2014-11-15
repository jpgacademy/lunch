Feature: Creating lunches

	Feature: Creating a lunch
		Given I am a registered user
		And my status is ADMIN
		When I create a lunch
		Then I should see the created lunch
