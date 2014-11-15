Feature: Ordering lunches

	Scenario: Order one lunch two weeks from now
		Given there is a lunch available on the date
		And the date is at least two weeks in the future
		And I am a registered user
		And I have one student in my family
		When I order a lunch on the date for my student
		Then I should see my lunch ordered for my student on the date

	Scenario: Order one week of lunches two weeks from now
		Given there are lunches availble two weeks from now
		And I am a registered user
		And I have one student in my family
		When I order one week of lunches two weeks from now for my student
		Then I should see my lunches ordered for my student

	Scenario: Order one lunch for next week
		Given there are lunches next week
		And I am a registered user
		And I have one student in my family
		When I order one lunch next week for my student
		Then I should see my order rejected
