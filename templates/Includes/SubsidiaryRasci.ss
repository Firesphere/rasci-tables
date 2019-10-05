<td id="$ID-$Subsidiary.ID" class="team
<% if $IsSelected(R, $Subsidiary.ID) %>r<% end_if %>
<% if $IsSelected(A, $Subsidiary.ID) %>a<% end_if %>
<% if $IsSelected(S, $Subsidiary.ID) %>s<% end_if %>
<% if $IsSelected(C, $Subsidiary.ID) %>c<% end_if %>
<% if $IsSelected(I, $Subsidiary.ID) %>i<% end_if %>">
    <% if $CurrentUser.inGroup('administrators') %>
    <select name="rasci-value[]" title="$Title" class="rasci-value">
        <option value=""></option>
        <option value="R-$ID-$Subsidiary.ID" <% if $IsSelected(R, $Subsidiary.ID) %>selected="selected"<% end_if %>>
            R
        </option>
        <option value="A-$ID-$Subsidiary.ID" <% if $IsSelected(A, $Subsidiary.ID) %>selected="selected"<% end_if %>>
            A
        </option>
        <option value="S-$ID-$Subsidiary.ID" <% if $IsSelected(S, $Subsidiary.ID) %>selected="selected"<% end_if %>>
            S
        </option>
        <option value="C-$ID-$Subsidiary.ID" <% if $IsSelected(C, $Subsidiary.ID) %>selected="selected"<% end_if %>>
            C
        </option>
        <option value="I-$ID-$Subsidiary.ID" <% if $IsSelected(I, $Subsidiary.ID) %>selected="selected"<% end_if %>>
            I
        </option>
    </select>
    <% else %>
        <% if $IsSelected(R, $Subsidiary.ID) %>R<% end_if %>
        <% if $IsSelected(A, $Subsidiary.ID) %>A<% end_if %>
        <% if $IsSelected(S, $Subsidiary.ID) %>S<% end_if %>
        <% if $IsSelected(C, $Subsidiary.ID) %>C<% end_if %>
        <% if $IsSelected(I, $Subsidiary.ID) %>I<% end_if %>
    <% end_if %>
</td>
